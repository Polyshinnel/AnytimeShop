<?php

namespace App\Service\Order;

use App\Repository\Delivery\DeliveryRepository;
use App\Repository\Order\OrderRepository;
use DB;
use Exception;

class CommonOrderService
{
    private OrderRepository $orderRepository;
    private DeliveryRepository $deliveryRepository;
    public function __construct(OrderRepository $orderRepository, DeliveryRepository $deliveryRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->deliveryRepository = $deliveryRepository;
    }

    /**
     * @param array $cart
     * @param string $name
     * @param string $phone
     * @param string $email
     * @param string $message
     * @param int $totalSum
     * @param array $promocodeData
     * @param array $deliveryInfo
     * @return array|string[]
     */
    public function createOrder(
        array $cart,
        string $name,
        string $phone,
        string $email,
        string $message,
        int $totalSum,
        array $promocodeData,
        array $deliveryInfo,
    ): array
    {
        try {
            DB::beginTransaction();
            $createOrderArr = [
                'customer_name' => $name,
                'customer_phone' => $phone,
                'customer_email' => $email,
                'customer_comment' => $message,
                'total_price' => $totalSum,
                'use_promocode' => isset($promocodeData['use_promocode']),
                'promocode' => $promocodeData['promocode'] ?? null
            ];
            $order = $this->orderRepository->createOrder($createOrderArr);

            $deliveryMethodInfo = $this->deliveryRepository->getDeliveryMethodByName($deliveryInfo['method_name']);
            $createOrderDelivery = [
                'order_id' => $order->id,
                'delivery_type_id' => $deliveryMethodInfo->id,
                'city' => $deliveryInfo['city'],
                'full_address' => $deliveryInfo['delivery_addr'],
                'pvz_id' => '123',
                'work_schedule' => 'Пн-Пт 09:00 - 18:00',
                'delivery_phone' => '+375 17 336-08-70'
            ];
            $this->orderRepository->createOrderDelivery($createOrderDelivery);

            $messageProducts = '';
            $count = 1;
            foreach ($cart['products'] as $product)
            {
                $createProductArr = [
                    'order_id' => $order->id,
                    'product_id' => $product['id'],
                    'quantity' => $product['quantity']
                ];
                $this->orderRepository->createOrderProduct($createProductArr);
                $message = sprintf("Товар %s \n<b>Наименование: </b>%s, <b>Количество: </b>%s",$count, $product['name'], $product['quantity']);
                $count++;
                $messageProducts .= $message;
            }

            $telegram_message = sprintf("Новый заказ с интернет магазина: \n<b>Имя: </b> %s, \n<b>Телефон: </b> %s, \n<b>Почта: </b> %s, \n", $name, $phone, $email);
            if($message) {
                $telegram_message .= sprintf("<b>Комментарий:</b> %s \n", $message);
            }
            $telegram_message.=sprintf("<b>Метод доставки: </b> %s \n", $deliveryInfo['method_name']);
            $telegram_message.=sprintf("<b>Адрес доставки: </b> %s, \n", $deliveryInfo['delivery_addr']);
            if(isset($promocodeData['use_promocode']))
            {
                $telegram_message.=sprintf("<b>Промокод: </b> %s \n", $promocodeData['promocode']);
            }
            $telegram_message.= "ТОВАРЫ: \n";
            $telegram_message.= $messageProducts;

            DB::commit();

            return [
                'err' => 'none',
                'message' => $telegram_message
            ];
        } catch (Exception $exception) {
            DB::rollBack();
            return [
                'message' => 'Something went wrong',
                'err' => $exception->getMessage()
            ];
        }
    }
}
