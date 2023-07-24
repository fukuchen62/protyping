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
        Schema::create('vocabularies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('language_id')->default(1);
            $table->string('word_spell', 200)->nullable(false);
            $table->string('japanese', 200)->nullable(false);
            $table->string('pronunciation', 200)->nullable(true);
            $table->string('meaning', 200)->nullable(false);
            $table->string('notion', 200)->nullable(true);
            $table->string('usage', 500)->nullable(false);
            $table->integer('level_id')->default(1);
            $table->boolean('is_show')->default(true);
            //create_atはNOT NULLにし、update_atはNULLを許容する
            //$table->timestamps();
            $table->timestamp('created_at')->nullable(false);
            $table->timestamp('updated_at')->nullable(true);
            $table->softDeletes(); // softDeletes()メソッドを使ってdeleted_atカラムを定義する
            //$table->timestamp('deleted_at')->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vocabularies');
    }
};
