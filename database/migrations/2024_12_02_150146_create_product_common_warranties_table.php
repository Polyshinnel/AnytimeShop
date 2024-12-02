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
        Schema::create('product_common_warranties', function (Blueprint $table) {
            $table->id();
            $table->text('warranty_text');
            $table->timestamps();
        });

        $data_items = [
            [
                'warranty_text' => 'При правильном использовании устройства для непрерывного мониторинга глюкозы мы предоставляем гарантию возврата товара в случае производственных дефектов.',
            ],
            [
                'warranty_text' => 'Возврат товара невозможен, если поломка произошла не по вине производителя, например, при неправильной эксплуатации устройства. Для долгосрочной и безопасной работы рекомендуем избегать интенсивных бань, плавания и других воздействий, которые могут повредить устройство.'
            ],
            [
                'warranty_text' => 'Наша служба поддержки имеет возможность удалённого подключения к вашему устройству и может отслеживать его состояние, включая такие случаи, как намокание или отклеивание сенсора.'
            ],
        ];

        foreach ($data_items as $item) {
            DB::table('product_common_warranties')->insert($item);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_common_warranties');
    }
};
