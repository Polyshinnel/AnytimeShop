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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title_img')->nullable();
            $table->text('content')->nullable();
            $table->timestamps();
        });

        $data_items = [
            [
                'name' => 'Оплата',
                'title_img' => null,
                'content' => '<div class="delivery-payment-common__text">
                    <p>При оформлении заказа в интернет-магазине возможна только онлайн-оплата. Оплата при получении недоступна. </p>
                    <p>Доступные способы оплаты: </p>
                    <ul>
                        <li>Банковской картой</li>
                        <li>СБП</li>
                    </ul>
                </div>',
            ]
        ];

        foreach ($data_items as $item) {
            DB::table('payments')->insert($item);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
