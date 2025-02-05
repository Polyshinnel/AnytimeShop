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
        Schema::create('product_common_delivery_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('img')->nullable();
            $table->timestamps();
        });

        $data_items = [
            [
                'name' => 'Доставка',
                'img' => 'images/delivery/delivery.png'
            ],
            [
                'name' => 'Самовывоз из офиса AnyTime',
                'img' => NULL
            ]
        ];

        foreach ($data_items as $item) {
            DB::table('product_common_delivery_types')->insert($item);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_common_delivery_types');
    }
};
