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
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('faq_group_id');
            $table->string('question');
            $table->text('answer');
            $table->timestamps();

            $table->index('faq_group_id', 'faqs_faq_group_id_index');
            $table->foreign('faq_group_id', 'faqs_faq_group_id_fk')
                ->on('faq_groups')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faqs');
    }
};
