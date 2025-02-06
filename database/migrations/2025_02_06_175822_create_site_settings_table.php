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
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('currency')->default('₽');
            $table->string('number_format')->default('+7(999)999-99-99');
            $table->integer('delivery_price')->default('190');
            $table->boolean('active')->default(0);
            $table->timestamps();
        });

        $data_items = [
            [
                'currency' => '₽',
                'number_format' => '+7(999)999-99-99',
                'delivery_price' => '190',
                'active' => true
            ],
            [
                'currency' => 'BYN',
                'number_format' => '+375(99)999-99-99',
                'delivery_price' => '190',
                'active' => false
            ],
            [
                'currency' => '₸',
                'number_format' => '+7(999)999-99-99',
                'delivery_price' => '190',
                'active' => false
            ],
            [
                'currency' => '֏',
                'number_format' => '+374(999)999-999',
                'delivery_price' => '190',
                'active' => false
            ]
        ];
        foreach ($data_items as $item) {
            DB::table('site_settings')->insert($item);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
