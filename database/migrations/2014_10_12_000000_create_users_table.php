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
            $table->id()->from(2212);
            $table->string('email', 255)->unique();
            $table->string('password');
            $table->boolean('confirmed')->default(false);
            $table->unsignedBigInteger('confirmation_code');
            $table->enum('role', ['company', 'admin'])->default('company');

            $table->rememberToken();
            $table->timestamps();
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
