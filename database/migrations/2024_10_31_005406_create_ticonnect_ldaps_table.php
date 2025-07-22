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
        Schema::create('ticonnect_ldaps', function (Blueprint $table) {
            $table->id();
            $table->string("server");
            $table->string("port");
            $table->string("user_admin");
            $table->string("password_admin");
            $table->string("domain_components");
            $table->string("filter");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticonnect_ldaps');
    }
};
