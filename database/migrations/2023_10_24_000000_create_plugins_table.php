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
        Schema::create('plugins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 30)->default('')->unique('code');
            $table->string('version', 10)->default('');
            $table->string('library')->default('');
            $table->unsignedTinyInteger('assign')->default(0);
            $table->unsignedInteger('install_date')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plugins');
    }
};
