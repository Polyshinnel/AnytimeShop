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
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('faq_group_id');
            $table->string('question');
            $table->text('answer');
            $table->timestamps();

            $table->index('faq_group_id', 'faqs_faq_group_id_index');
            $table->foreign('faq_group_id', 'faqs_faq_group_id_fk')
                ->on('faq_groups')
                ->references('id');
        });

        $data_items = [
            [
                'faq_group_id' => 1,
                'question' => 'Больно ли вставлять сенсор?',
                'answer' => 'Процесс установки сенсора минимально болезненный благодаря использованию специального аппликатора, который делает процедуру быстрой и комфортной.',
            ],
            [
                'faq_group_id' => 2,
                'question' => 'Как я могу забрать свой товар?',
                'answer' => 'На данный момент доступно два варианта: Самовывоз из пункта выдачи Boxberry и Самовывоз из нашего офиса',
            ],
        ];

        foreach ($data_items as $item) {
            DB::table('faqs')->insert($item);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faqs');
    }
};
