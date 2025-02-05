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
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('img');
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->index('product_id', 'product_images_product_id_index');
            $table->foreign('product_id', 'product_images_product_id_fk')
                ->on('products')
                ->references('id');
        });

        $data_items = [
            [
                'product_id' => 1,
                'img' => 'images/products/1/1.png',
                'sort_order' => 0
            ],
            [
                'product_id' => 1,
                'img' => 'images/products/1/2.png',
                'sort_order' => 1
            ],
            [
                'product_id' => 2,
                'img' => 'images/products/2/1.png',
                'sort_order' => 0
            ],
            [
                'product_id' => 2,
                'img' => 'images/products/2/2.png',
                'sort_order' => 1
            ],
            [
                'product_id' => 2,
                'img' => 'images/products/2/3.png',
                'sort_order' => 2
            ],
        ];

        foreach ($data_items as $item) {
            DB::table('product_images')->insert($item);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_images');
    }
};
