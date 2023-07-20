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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50)->nullable(false);
            $table->string('email', 100)->nullable(false)->unique();
            $table->timestamp('email_verified_at')->nullable(true);
            $table->string('password', 100)->nullable(false);
            $table->integer('authority')->default(1);
            $table->string('remember_token', 100)->nullable(true);
            $table->boolean('is_show')->default(true);
            // created_atをNOT NULLに設定するため、個別に記載
            $table->timestamp('created_at')->nullable(false);
            $table->timestamp('updated_at')->nullable(true);
            $table->softDeletes('delete_at')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
