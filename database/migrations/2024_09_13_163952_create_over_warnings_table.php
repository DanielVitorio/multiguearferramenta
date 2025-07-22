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
        Schema::create('over_warnings', function (Blueprint $table) {
            $table->id();
            $table->string('user');
            $table->string('Plate');
            $table->string('date');
            $table->string('beginning');
            $table->string('end');
            $table->string('local');
            $table->string('requesting');
            $table->string('motive');
            $table->string('solved');
            $table->string('calling_id');
            $table->string('observation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('over_warnings');
    }
};
