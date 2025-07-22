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
        Schema::create('mappings', function (Blueprint $table) {
            $table->id();
            $table->string("address");
            $table->string("ramal");
            $table->string("ramal_cisco");
            $table->string("hostname");
            $table->string("image");
            $table->string("system");
            $table->string("domain");
            $table->string("ram");
            $table->string("disk");
            $table->string("disk_mark");
            $table->string("disk_space");
            $table->string("processor");
            $table->string("model");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mappings');
    }
};
