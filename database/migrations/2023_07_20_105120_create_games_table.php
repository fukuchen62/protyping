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
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->string('game_name', 60)->nullable(false);
            $table->string('discription', 300);
            $table->string('game_icon', 50);
            $table->integer('language_id')->default(1);
            $table->integer('level_id')->default(1);
            $table->boolean('is_show')->default(true);
            //create_atはNOT NULLにし、update_atはNULLを許容する
            //$table->timestamps();
            $table->timestamp('created_at')->nullable(false);
            $table->timestamp('updated_at')->nullable(true);
            $table->timestamp('deleted_at')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
