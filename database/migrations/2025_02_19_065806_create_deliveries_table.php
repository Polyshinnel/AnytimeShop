<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title_img')->nullable();
            $table->text('content')->nullable();
            $table->timestamps();
        });

        $data_items = [
            [
                'name' => 'Доставка',
                'title_img' => 'images/delivery/delivery.png',
                'content' => '<div class="delivery-payment-common__text">
                    <p>Сеть пунктов выдачи Boxberry — <a href="https://boxberry.ru/find_an_office">https://boxberry.ru/find_an_office</a></p>
                    <p>Самовывоз из пункта выдачи Boxberry</p>
                    <p>Стоимость: 190 рублей</p>
                    <p>Сроки: 2-7 дней</p>
                    <p>Способ оплаты: Банковской картой, СБП</p>
                </div>

                <div class="delivery-payment-common__text">
                    <p>Детали</p>
                    <ul>
                        <li>Срок хранения заказа в пункте выдачи — 14 дней</li>
                        <li>Чтобы получить заказ, нужно предъявить паспорт</li>
                        <li>При отказе от получения предоплаченного заказа, стоимость доставки не возвращается</li>
                        <li>Найти пункт выдачи в своем городе и уточнить сроки доставки вы можете на сайте Boxberry</li>
                        <li>Если пункт выдачи переполнен, Boxberry может доставить заказ в ближайший пункт от выбранного. Следить за статусом можно на сайте сервиса</li>
                        <li>Сумма заказа не может превышать 300 000 рублей</li>
                    </ul>
                    <i>* Пожалуйста, учтите, что доставка каждого заказа оплачивается отдельно, даже если вы выбираете для получения один день.</i>
                </div>',
            ],
            [
                'name' => 'Самовывоз из офиса AnyTime',
                'title_img' => null,
                'content' => '<div class="delivery-payment-common__text">
                    <p>Стоимость: Бесплатно</p>
                    <p>Сроки: 2-3 дня</p>
                    <p>Способ оплаты: Банковской картой, СБП</p>
                    <p>Детали:</p>
                    <ul>
                        <li>Срок хранения заказа в магазине — 5 дней</li>
                        <li>Адрес: 220014 Минск, Филимонова 25Г-1000</li>
                    </ul>
                </div>',
            ],
        ];

        foreach ($data_items as $item) {
            DB::table('deliveries')->insert($item);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
