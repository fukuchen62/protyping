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
            $table->integer('contact_type')->default(1);
            $table->string('language_id')->nullable(true);
            $table->string('word_spell', 200)->nullable(true);
            $table->string('japanese', 200)->nullable(true);
            $table->string('meaning', 200)->nullable(true);
            $table->string('usage', 500)->nullable(true);
            $table->string('memo', 500)->nullable(true);
            $table->string('contact_name', 50)->nullable(true);
            $table->string('email', 100)->nullable(true);
            $table->integer('status')->default(1);
            // created_atをNOT NULLに設定するため、個別に記載
            $table->timestamp('created_at')->nullable(false);
            $table->integer('created_user_id')->default(1);
            $table->timestamp('updated_at')->nullable(true);
            $table->integer('updated_user_id')->nullable(true)->default(null);
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
