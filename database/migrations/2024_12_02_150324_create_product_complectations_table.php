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
        Schema::create('product_complectations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->text('complect_text');
            $table->timestamps();

            $table->index('product_id', 'product_complectations_product_id_index');
            $table->foreign('product_id', 'product_complectations_product_id_fk')
                ->on('products')
                ->references('id');
        });

        $data_items = [
            [
                'product_id' => 1,
                'complect_text' => 'Апликатор и сенсор Yuwell'
            ],
            [
                'product_id' => 1,
                'complect_text' => 'Оригинальная продукция'
            ],
            [
                'product_id' => 1,
                'complect_text' => 'Гарантия от производителя'
            ],
            [
                'product_id' => 1,
                'complect_text' => 'Служба поддержки'
            ],
            [
                'product_id' => 2,
                'complect_text' => 'Апликатор и сенсор Yuwell'
            ],
            [
                'product_id' => 2,
                'complect_text' => 'Оригинальная продукция'
            ],
            [
                'product_id' => 2,
                'complect_text' => 'Гарантия от производителя'
            ],
            [
                'product_id' => 2,
                'complect_text' => 'Служба поддержки'
            ],
        ];

        foreach ($data_items as $item) {
            DB::table('product_complectations')->insert($item);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_complectations');
    }
};
