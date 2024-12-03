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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->timestamps();

            $table->index('order_id', 'order_details_order_id_index');
            $table->foreign('order_id', 'order_details_order_id_fk')
                ->on('orders')
                ->references('id');

            $table->index('product_id', 'order_details_product_id_index');
            $table->foreign('product_id', 'order_details_product_id_fk')
                ->on('products')
                ->references('id');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
