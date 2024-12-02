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
        Schema::create('product_common_chars', function (Blueprint $table) {
            $table->id();
            $table->text('char_text');
            $table->timestamps();
        });

        $data_items = [
            [
                'char_text' => 'Нет необходимости в калибровке'
            ],
            [
                'char_text' => 'До года использования'
            ],
            [
                'char_text' => 'Водонепроницаемость IP58'
            ],
            [
                'char_text' => 'Настраиваемые оповещения и сигналы предупреждают заранее о низком или высоком уровне'
            ],
            [
                'char_text' => 'Использование в автономном режиме с приложением Anytime'
            ],
            [
                'char_text' => 'Делитесь уровнем глюкозы в режиме реального времени с подписчиками'
            ],
            [
                'char_text' => '7 направленных стрелок тренда. Эти стрелки показывают, растет ли уровень глюкозы, падает или остается стабильным, а также насколько быстро происходит это изменение.'
            ],
            [
                'char_text' => 'Диапазон измерений: 1,7 - 27,8 ммоль/л'
            ],
            [
                'char_text' => 'Точность MARD 9,07% (на основе клинических данных)'
            ],
        ];

        foreach ($data_items as $item) {
            DB::table('product_common_chars')->insert($item);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_common_chars');
    }
};
