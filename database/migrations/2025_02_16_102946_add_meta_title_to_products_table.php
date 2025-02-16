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
            $table->string('meta_title')->after('new_price')->nullable();
            $table->string('meta_description')->after('meta_title')->nullable();
            $table->string('seo_url')->after('meta_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('meta_title');
            $table->dropColumn('meta_description');
            $table->dropColumn('seo_url');
        });
    }
};
