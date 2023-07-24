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
        Schema::create('likes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id');
            $table->integer('games_id');
            $table->integer('news_id');
            $table->integer('knowhow_id');
            $table->timestamp('created_at')->nullable(false);
            $table->softDeletes(); // softDeletes()メソッドを使ってdeleted_atカラムを定義する
            //$table->timestamp('deleted_at')->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
