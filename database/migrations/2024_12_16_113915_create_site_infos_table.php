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
        Schema::create('site_infos', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->string('title');
            $table->string('description');
            $table->string('og_image');
            $table->string('h1');
            $table->timestamps();
        });

        $data_items = [
            [
                'url' => '/',
                'title' => 'Anytime CGM | Главная',
                'description' => 'Управляйте диабетом с уверенностью. Anytime CGM Официальный представитель Yuwell Anytime CGM на территории СНГ. ',
                'og_image' => '/assets/img/og-image.png',
                'h1' => 'Anytime CGM',
            ],
            [
                'url' => 'catalog',
                'title' => 'Anytime CGM | Каталог',
                'description' => 'Каталог нашей актуальной продукции',
                'og_image' => '/assets/img/og-image.png',
                'h1' => 'Каталог',
            ],
            [
                'url' => 'documentation',
                'title' => 'Anytime CGM | Документация',
                'description' => 'Инструкции по эксплуатации наших устройств Yuwell Anytime CGM',
                'og_image' => '/assets/img/og-image.png',
                'h1' => 'Документация',
            ],
            [
                'url' => 'delivery',
                'title' => 'Anytime CGM | Доставка и оплата',
                'description' => 'Информация об оплате, доставке и самовывозе',
                'og_image' => '/assets/img/og-image.png',
                'h1' => 'Доставка и оплата',
            ],
            [
                'url' => 'faq',
                'title' => 'Anytime CGM | FAQ',
                'description' => 'Есть вопрос? Мы здесь, чтобы помочь! Часто задаваемые вопросы по устройствам Yuwell Anytime CGM',
                'og_image' => '/assets/img/og-image.png',
                'h1' => 'Часто задаваемые вопросы',
            ],
            [
                'url' => 'contacts',
                'title' => 'Anytime CGM | Контакты',
                'description' => 'Способы связаться с нашей компанией Anytime CGM',
                'og_image' => '/assets/img/og-image.png',
                'h1' => 'Контакты',
            ],
            [
                'url' => 'about',
                'title' => 'Anytime CGM | О компании',
                'description' => 'Данные о производителе Yuwell Group',
                'og_image' => '/assets/img/og-image.png',
                'h1' => 'О компании',
            ],
            [
                'url' => 'help',
                'title' => 'Anytime CGM | Помощь',
                'description' => 'Данные о производителе Yuwell Group',
                'og_image' => '/assets/img/og-image.png',
                'h1' => 'Бесплатная консультация менеджера',
            ],
            [
                'url' => 'articles',
                'title' => 'Anytime CGM | Статьи',
                'description' => 'Полезные статьи о диабете и его предотвращении',
                'og_image' => '/assets/img/og-image.png',
                'h1' => 'Статьи',
            ],
            [
                'url' => 'news',
                'title' => 'Anytime CGM | Новости',
                'description' => 'Новости компании и другая полезная информация',
                'og_image' => '/assets/img/og-image.png',
                'h1' => 'Новости',
            ],
            [
                'url' => 'sertificates',
                'title' => 'Anytime CGM | Сертификаты',
                'description' => 'Сертификаты на оборудование Yuwell Anytime CGM. Все аппараты прошли строгую сертификацию и соответствуют международным стандартам.',
                'og_image' => '/assets/img/og-image.png',
                'h1' => 'Наша продукция – ваш гарант качества',
            ],
        ];

        foreach ($data_items as $item) {
            DB::table('site_infos')->insert($item);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_infos');
    }
};
