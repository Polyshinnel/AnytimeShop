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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('avatar')->nullable();
            $table->string('name');
            $table->text('text');
            $table->integer('rating');
            $table->timestamps();
        });

        $data_items = [
            [
                'avatar' => 'images/review/1.png',
                'name' => 'moodsofdion',
                'text' => 'Cенсор отлично держится даже во время тренировок. Я пробовала другие бренды, и они часто отклеивались. Этот сенсор – находка для тех, кто ведет активный образ жизни.',
                'rating' => '5',
            ],
            [
                'avatar' => 'images/review/2.png',
                'name' => 'Ilya_sotnikov',
                'text' => 'Даже после посещения бассейна сенсор остался на месте, а это огромный плюс для меня. Удобство и качество на высшем уровне!',
                'rating' => '5',
            ],
            [
                'avatar' => 'images/review/3.png',
                'name' => '_nadyashaa_',
                'text' => 'Трансмиттер подключается быстро, данные передаются на телефон без задержек. Устройство компактное и удобное в использовании, что делает его незаменимым для активной жизни.',
                'rating' => '4',
            ],
            [
                'avatar' => 'images/review/4.png',
                'name' => 'anechk.a',
                'text' => 'Особенно впечатлило приложение: оно простое, понятное, с мгновенной передачей данных. Интерфейс интуитивно понятен, вся информация доступна в одном месте.',
                'rating' => '5',
            ],
            [
                'avatar' => 'images/review/5.png',
                'name' => 'medvedyukulian',
                'text' => 'Сенсор удобен в установке – благодаря подробным инструкциям в приложении всё получилось быстро и безболезненно. Уже две недели отслеживаю уровень сахара без единой проблемы.',
                'rating' => '5',
            ],
        ];

        foreach ($data_items as $item) {
            DB::table('reviews')->insert($item);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
