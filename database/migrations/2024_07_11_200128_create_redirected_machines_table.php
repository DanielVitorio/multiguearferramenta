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
        Schema::create('redirected_machines', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('address')->unique();
            $table->string('hostname')->unique()->default('0');
            $table->string('operating_system');
            $table->string('location');
            $table->string('follow-up');
            $table->string('status');
            $table->string('disk');
            $table->string('site');
            $table->string('morning')->nullable();
            $table->string('afternoon')->nullable();
            $table->string('night')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redirected_machines');
    }
};
