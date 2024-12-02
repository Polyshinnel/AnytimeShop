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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->decimal('new_price', 10, 2)->nullable();
            $table->timestamps();
        });

        $data_items = [
            [
                'name' => 'Сенсор и аппликатор Yuwell Anytime CGM',
                'description' => '<p>Сенсор — это небольшое устройство, которое прикрепляется к коже и непрерывно измеряет уровень сахара в крови.</p><p>Автоаппликатор - который легко вводит встроенный сенсор под кожу.</p><p>Официальный представитель Yuwell Anytime CGM на территории СНГ.</p>',
                'price' => 300,
                'new_price' => NULL
            ],
            [
                'name' => 'Трансмиттер с зарядным блоком Yuwell Anytime CGM',
                'description' => '<p>Трансмиттер крепится поверх сенсора и передает данные
                на телефон по Bluetooth.</p><p>Один трансмиттер предоставляется в комплекте.
                Трансмиттер может использоваться два года.</p><p>Рекомендуется заряжать трансмиттер после каждого использования сенсора.</p><p>Официальный представитель Yuwell Anytime CGM на территории СНГ.</p>',
                'price' => 450,
                'new_price' => 200
            ],
        ];


        foreach ($data_items as $item) {
            DB::table('products')->insert($item);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
