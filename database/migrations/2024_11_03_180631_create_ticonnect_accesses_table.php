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
        Schema::create('ticonnect_accesses', function (Blueprint $table) {
            $table->id();
            $table->string("user");
            $table->string("logged_in_user");
            $table->string("address");
            $table->string("remote_user");
            $table->string("remote_address");
            $table->string("remote_session");
            $table->string("connection_type");
            $table->string("date");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticonnect_accesses');
    }
};
