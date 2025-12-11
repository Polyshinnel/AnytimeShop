<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use App\Models\OrderDelivery;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Api\AlfaPayApi;
use App\Api\BitrixApi;

class CheckOrderPaymentStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:check-payment-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Проверяет статус оплаты неоплаченных заказов через AlfaPay API';

    /**
     * Execute the console command.
     */
    public function handle(AlfaPayApi $alfapayApi, BitrixApi $bitrixApi): int
    {
        $this->info('Начинаем проверку статуса оплаты заказов...');

        // Получаем все заказы где payed = false и payment_order_id != null
        $orders = Order::where('payed', false)
            ->whereNotNull('payment_order_id')
            ->get();

        if ($orders->isEmpty()) {
            $this->info('Нет заказов для проверки.');
            return Command::SUCCESS;
        }

        $this->info("Найдено заказов для проверки: {$orders->count()}");

        $checked = 0;
        $updated = 0;
        $errors = 0;

        foreach ($orders as $order) {
            try {
                $this->line("Проверяем заказ #{$order->id}...");
                
                $result = $alfapayApi->getOrderStatus($order->id);
                
                if (isset($result['errorCode'])) {
                    $this->warn("Ошибка для заказа #{$order->id}: {$result['errorMessage']}");
                    $errors++;
                } else {
                    // Проверяем, был ли заказ обновлен (стал оплаченным)
                    $order->refresh();
                    if ($order->payed) {
                        $this->info("Заказ #{$order->id} успешно оплачен!");
                        
                        // Создаем сделку в Bitrix
                        try {
                            $this->createBitrixDeal($order, $bitrixApi);
                            $this->info("Сделка в Bitrix создана для заказа #{$order->id}");
                        } catch (\Exception $e) {
                            $this->error("Ошибка при создании сделки в Bitrix для заказа #{$order->id}: {$e->getMessage()}");
                        }
                        
                        $updated++;
                    }
                    $checked++;
                }
            } catch (\Exception $e) {
                $this->error("Исключение при проверке заказа #{$order->id}: {$e->getMessage()}");
                $errors++;
            }
        }

        $this->info("Проверка завершена. Проверено: {$checked}, Обновлено: {$updated}, Ошибок: {$errors}");

        return Command::SUCCESS;
    }

    /**
     * Создает сделку в Bitrix для оплаченного заказа
     *
     * @param Order $order
     * @param BitrixApi $bitrixApi
     * @return void
     */
    private function createBitrixDeal(Order $order, BitrixApi $bitrixApi): void
    {
        $orderName = sprintf('ORDER_BY-%s', $order->id);

        $orderDelivery = OrderDelivery::where('order_id', $order->id)->first();
        $deliveryType = 'Самовывоз из офиса AnyTime';
        $deliveryText = '';

        if ($orderDelivery) {
            if ($orderDelivery->delivery_type_id == 1) {
                $deliveryType = 'Сдэк';
            }

            $deliveryAddr = $orderDelivery->full_address ?? '';
            $deliveryCity = $orderDelivery->city ?? '';
            $deliveryText = $deliveryType . ': ' . $deliveryAddr . ', ' . $deliveryCity;
        }

        $createBitrixDeal = [
            'title' => 'Новый заказ с сайта ' . $orderName,
            'username' => $order->customer_name,
            'phone' => $order->customer_phone,
            'email' => $order->customer_email,
            'promocode' => $order->promocode,
            'comments' => ($order->customer_comment ?? '') . ' ' . $deliveryText
        ];

        $productsArr = [];

        $orderProducts = OrderDetail::where('order_id', $order->id)->get();
        foreach ($orderProducts as $orderProduct) {
            $product = Product::find($orderProduct->product_id);
            if ($product) {
                $productsArr[] = [
                    'name' => $product->name,
                    'quantity' => $orderProduct->quantity,
                ];
            }
        }

        $createBitrixDeal['products'] = $productsArr;

        $bitrixApi->createDeal($createBitrixDeal);
    }
}

