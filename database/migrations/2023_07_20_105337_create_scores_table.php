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
        Schema::create('scores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('game_id')->nullable(false);
            $table->integer('user_id')->default(0);
            $table->string('username', 30)->nullable(true);
            $table->integer('score')->default(0);
            $table->boolean('is_show')->default(true);
            //create_atはNOT NULLにし、update_atはNULLを許容する
            //$table->timestamps();
            $table->timestamp('created_at')->nullable(false);
            $table->timestamp('updated_at')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scores');
    }
};
