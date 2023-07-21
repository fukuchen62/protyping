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
        Schema::create('knowhows', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 60)->nullable(false);
            $table->integer('category_id')->nullable(false);
            $table->string('thumbnail', 200)->nullable(true);
            $table->string('summary', 250)->nullable(false);
            $table->string('content', 65535)->nullable(false);
            $table->boolean('is_show')->default(true);

            // created_atをNOT NULLに設定するため、個別に記載
            $table->timestamp('created_at')->nullable(false);
            $table->integer('created_user_id')->default(1);
            $table->timestamp('updated_at')->nullable(true);
            $table->integer('updated_user_id')->nullable(true);
            $table->softDeletes('deleted_at')->nullable(true);
            $table->integer('deleted_user_id')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('knowhows');
    }
};
