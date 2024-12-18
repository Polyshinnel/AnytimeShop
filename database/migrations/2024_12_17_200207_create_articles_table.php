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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title')->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->string('description_short')->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->string('thumbnail')->nullable();
            $table->text('text')->charset('utf8mb4')->collation('utf8mb4_unicode_ci');

            $table->string('meta_title')->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->string('meta_description')->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
