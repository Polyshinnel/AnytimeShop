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
        Schema::create('common_settings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('value');
            $table->timestamps();
        });

        $data_items = [
            [
                'name' => 'site_host',
                'type' => 'site_settings',
                'value' => 'https://diabet-anytime.ru/',
            ]
        ];

        foreach ($data_items as $item) {
            DB::table('common_settings')->insert($item);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('common_settings');
    }
};
