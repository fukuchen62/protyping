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
            $table->string('lang_icon', 50);
            $table->string('discription', 200);
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
        Schema::dropIfExists('languages');
    }
};
