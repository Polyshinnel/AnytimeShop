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
        Schema::create('order_deliveries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('delivery_type_id');
            $table->string('city');
            $table->string('full_address');
            $table->string('pvz_id')->nullable();
            $table->string('work_schedule');
            $table->string('delivery_phone');
            $table->timestamps();


            $table->index('order_id', 'delivery_addresses_order_id_index');
            $table->foreign('order_id', 'delivery_addresses_order_id_fk')
                ->on('orders')
                ->references('id');

            $table->index('delivery_type_id', 'delivery_addresses_delivery_type_id_index');
            $table->foreign('delivery_type_id', 'delivery_addresses_delivery_type_id_fk')
                ->on('delivery_methods')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_deliveries');
    }
};
