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
        Schema::create('need_helps', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->string('block_title');
            $table->string('block_subtitle');
            $table->text('content');
            $table->string('form_title');
            $table->string('form_subtitle')->nullable();
            $table->timestamps();
        });

        $data_items = [
            [
                'name' => 'Бесплатная консультация менеджера',
                'block_title' => 'Бесплатная консультация менеджера',
                'block_subtitle' => 'Мы заботимся о вашем комфорте и готовы помочь вам освоить работу с устройством.',
                'content' => '<h3>Что включает консультация менеджера?</h3>
                    <p>Ответы на все вопросы по работе с Anytime.</p>
                    <p>Помощь в настройке и использовании приложения.</p>
                    <p>Советы по интерпретации базовых данных устройства</p>',
                'form_title' => 'Как получить?',
                'form_subtitle' => null,
            ],
            [
                'name' => 'Консультация эндокринолога',
                'block_title' => 'Консультация эндокринолога – профессиональная поддержка',
                'block_subtitle' => 'Приобретая Anytime, вы можете получить консультацию врача эндокринолога.',
                'content' => '<h3>Что включает консультация эндокринолога?</h3>
                    <p><b>Детальный анализ данных:</b> Специалист изучит показатели, собранные устройством и приложением.</p>
                    <p><b>Рекомендации по эндокринологическим показателям:</b> Помощь в корректировке здоровья и улучшении общего самочувствия.</p>',
                'form_title' => 'Как записаться?',
                'form_subtitle' => 'После покупки Анитайм свяжитесь с нами для записи на консультацию.',
            ],
        ];
        foreach ($data_items as $item) {
            DB::table('need_helps')->insert($item);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('need_helps');
    }
};
