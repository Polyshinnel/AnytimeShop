<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_common_deliveries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('delivery_type_id');
            $table->string('text');
            $table->timestamps();

            $table->index('delivery_type_id', 'product_common_deliveries_delivery_type_id_index');
            $table->foreign('delivery_type_id', 'product_common_deliveries_delivery_type_id_fk')
                ->on('product_common_delivery_types')
                ->references('id');
        });

        $data_items = [
            [
                'delivery_type_id' => 1,
                'text' => 'Самовывоз из пункта выдачи Boxberry'
            ],
            [
                'delivery_type_id' => 1,
                'text' => 'Сроки: 2-7 дней'
            ],
            [
                'delivery_type_id' => 1,
                'text' => 'Стоимость: 190 рублей'
            ],
            [
                'delivery_type_id' => 2,
                'text' => 'Стоимость: Бесплатно'
            ],
            [
                'delivery_type_id' => 2,
                'text' => 'Сроки: выдача в день заказа'
            ],
            [
                'delivery_type_id' => 2,
                'text' => 'Адрес: 220014 Минск, Филимонова 25Г-1000'
            ],
        ];

        foreach ($data_items as $item) {
            DB::table('product_common_deliveries')->insert($item);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_common_deliveries');
    }
};
