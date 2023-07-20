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
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contact_id')->default(1);
            $table->string('language_id')->nullable(false);
            $table->string('word_spell', 200)->nullable(true);
            $table->string('japanese', 200)->nullable(true);
            $table->string('meaning', 200)->nullable(true);
            $table->string('usage', 500)->nullable(true);
            $table->string('memo', 500)->nullable(true);
            $table->string('email', 100)->nullable(true);
            $table->integer('status')->default(1);
            // created_atをNOT NULLに設定するため、個別に記載
            $table->timestamp('created_at')->nullable(false);
            $table->timestamp('updated_at')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
