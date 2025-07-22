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
        Schema::create('consultants', function (Blueprint $table) {
            $table->id();
            $table->timestamps();        
            $table->string('machine_address')->nullable();
            $table->string('registration')->unique()->default('0');
            $table->string('timetable');
            $table->string('shift');
            $table->string('name');
            $table->string('cpf');
            $table->string('follow-up');
            $table->string('added_user')->nullable()->default('0');
            $table->string('status');
            $table->string('beginning')->nullable()->default('0');
            $table->string('end')->nullable()->default('0');
            $table->string('local');
            $table->string('supervisor');
            $table->string('coordinator');
            $table->string('registration_tim');
            $table->string('pin');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultants');
    }
};
