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
        Schema::table('products', function (Blueprint $table) {
            $table->integer('category_id')->default(1)->after('seo_url');
            $table->decimal('benefit')->default(0)->after('category_id');
            $table->decimal('economy')->default(0)->after('benefit');
        });

        $dataItems = [
            [
                'name' => '2 недели набор',
                'description' => 'Наш стартовый набор создан для того, чтобы предоставить вам все необходимые продукты для начала использования системы постоянного мониторинга глюкозы Anytime CT-3C. В него входят один трансмиттер Yuwell Anytime (служит 2 года!) и разное количество сенсоров Yuwell Anytime в зависимости от выбранной продолжительности набора.',
                'price' => 300,
                'meta_title' => '2 недели набор',
                'meta_description' => 'Купить набор сенсоров на 2 недели Yuwell Anytime CGM в Минске с Доставкой по Республике Беларусь. Официальный представитель  Yuwell в СНГ +375 17 336-08-70',
                'seo_url' => '2-week-starter-kit',
                'category_id' => 2,
                'benefit' => 48,
                'economy' => 0
            ],
            [
                'name' => '4 недели набор',
                'description' => 'Наш стартовый набор создан для того, чтобы предоставить вам все необходимые продукты для начала использования системы постоянного мониторинга глюкозы Anytime CT-3C. В него входят один трансмиттер Yuwell Anytime (служит 2 года!) и разное количество сенсоров Yuwell Anytime в зависимости от выбранной продолжительности набора.',
                'price' => 400,
                'meta_title' => '4 недели набор',
                'meta_description' => 'Купить набор сенсоров на 4 недели Yuwell Anytime CGM в Минске с Доставкой по Республике Беларусь. Официальный представитель  Yuwell в СНГ +375 17 336-08-70',
                'seo_url' => '4-week-starter-kit',
                'category_id' => 2,
                'benefit' => 96,
                'economy' => 12
            ],
            [
                'name' => '12 недель набор',
                'description' => 'Наш стартовый набор создан для того, чтобы предоставить вам все необходимые продукты для начала использования системы постоянного мониторинга глюкозы Anytime CT-3C. В него входят один трансмиттер Yuwell Anytime (служит 2 года!) и разное количество сенсоров Yuwell Anytime в зависимости от выбранной продолжительности набора.',
                'price' => 500,
                'meta_title' => '4 недели набор',
                'meta_description' => 'Купить набор сенсоров на 4 недели Yuwell Anytime CGM в Минске с Доставкой по Республике Беларусь. Официальный представитель  Yuwell в СНГ +375 17 336-08-70',
                'seo_url' => '12-week-starter-kit',
                'category_id' => 2,
                'benefit' => 288,
                'economy' => 74
            ],
        ];

        foreach ($dataItems as $item)
        {
            \App\Models\Product::create($item);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('category_id');
            $table->dropColumn('benefit');
        });

        $deleteList = [
            '2 недели набор',
            '4 недели набор',
            '12 недель набор'
        ];

        foreach ($deleteList as $item)
        {
            \App\Models\Product::where('name', $item)->delete();
        }
    }
};
