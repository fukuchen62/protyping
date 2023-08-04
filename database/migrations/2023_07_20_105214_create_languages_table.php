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
        Schema::create('languages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('language_name', 50)->nullable(false);
            $table->string('lang_icon', 50)->nullable(true);
            $table->string('discription', 200)->nullable(true);
            $table->boolean('is_show')->default(true);
            //create_atはNOT NULLにし、update_atはNULLを許容する
            //$table->timestamps();
            $table->timestamp('created_at')->nullable(false);
            $table->integer('created_user_id')->default(null);
            $table->timestamp('updated_at')->nullable(true);
            $table->integer('updated_user_id')->nullable(true)->default(null);
            $table->softDeletes('deleted_at')->nullable(true);
            $table->integer('deleted_user_id')->nullable(true)->default(null);
            // softDeletes()メソッドを使ってdeleted_atカラムを定義する
            //$table->timestamp('deleted_at')->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('languages');
    }
};
