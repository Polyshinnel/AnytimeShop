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
        Schema::create('app_sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title_block_1');
            $table->text('text_block_1');
            $table->string('title_block_2');
            $table->text('text_block_2');
            $table->string('img');
            $table->string('img_alt');
            $table->string('img_title');
            $table->timestamps();
        });

        $data_items = [
            [
                'title_block_1' => 'Текущие данные глюкозы',
                'text_block_1' => 'Проверяйте уровень глюкозы в режиме реального времени.',
                'title_block_2' => 'Ежедневный обзор',
                'text_block_2' => 'Данные уровня глюкозы в крови, включая средний, максимальный и минимальный значения, показатели гипогликемии и гипергликемии.',
                'img' => 'images/app-slider/1.png',
                'img_alt' => 'Скриншот приложения Follow Anytime |  AnyTime',
                'img_title' => 'Скриншот приложения Follow Anytime |  AnyTime',
            ],
            [
                'title_block_1' => 'Ежедневный обзор',
                'text_block_1' => 'Данные уровня глюкозы в крови, включая средний, максимальный и минимальный значения, показатели гипогликемии и гипергликемии.',
                'title_block_2' => 'Журнал',
                'text_block_2' => 'Дополняйте график личными примечаниями.',
                'img' => 'images/app-slider/2.png',
                'img_alt' => 'Скриншот приложения Follow Anytime |  AnyTime',
                'img_title' => 'Скриншот приложения Follow Anytime |  AnyTime',
            ],
            [
                'title_block_1' => 'Настройка значений',
                'text_block_1' => 'Установка пользователем пределов высокого и низкого уровня глюкозы в крови.',
                'title_block_2' => 'Отчет данных',
                'text_block_2' => 'Приложение отслеживает и регистрирует, позволяя анализировать данные по временным интервалам.',
                'img' => 'images/app-slider/3.png',
                'img_alt' => 'Скриншот приложения Follow Anytime |  AnyTime',
                'img_title' => 'Скриншот приложения Follow Anytime |  AnyTime',
            ],
            [
                'title_block_1' => 'Отчет данных',
                'text_block_1' => 'Приложение отслеживает и регистрирует, позволяя анализировать данные по временным интервалам.',
                'title_block_2' => 'Текущие данные глюкозы',
                'text_block_2' => 'Проверяйте уровень глюкозы в режиме реального времени',
                'img' => 'images/app-slider/3.png',
                'img_alt' => 'Скриншот приложения Follow Anytime |  AnyTime',
                'img_title' => 'Скриншот приложения Follow Anytime |  AnyTime',
            ],
        ];

        foreach ($data_items as $item) {
            DB::table('app_sliders')->insert($item);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_sliders');
    }
};
