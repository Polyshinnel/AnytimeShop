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
        Schema::table('site_settings', function (Blueprint $table) {
            $table->boolean('exchange')->default(false)->after('active');
            $table->string('currency_code')->nullable()->after('exchange');
            $table->integer('money_quantity')->nullable()->after('currency_code');
        });

        $dataItems = [
            [
                'id' => 1,
                'update' => [
                    'exchange' => true,
                    'currency_code' => '456',
                    'money_quantity' => 100
                ],
            ],
            [
                'id' => 3,
                'update' => [
                    'exchange' => true,
                    'currency_code' => '459',
                    'money_quantity' => 1000
                ],
            ]
        ];
        foreach ($dataItems as $item)
        {
            \App\Models\SiteSettings::where('id', $item['id'])->update($item['update']);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn('exchange');
            $table->dropColumn('currency_code');
            $table->dropColumn('money_quantity');
        });
    }
};
