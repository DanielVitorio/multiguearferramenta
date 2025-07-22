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
        Schema::create('approveds', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('Data');
            $table->string('Name');
            $table->string('machine');
            $table->string('logged_in_user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approveds');
    }
};
