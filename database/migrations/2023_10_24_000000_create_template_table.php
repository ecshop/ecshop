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
        Schema::create('template', function (Blueprint $table) {
            $table->increments('id');
            $table->string('filename', 30)->default('');
            $table->string('region', 40)->default('');
            $table->string('library', 40)->default('');
            $table->unsignedTinyInteger('sort_order')->default(0);
            $table->unsignedInteger('id_value')->default(0);
            $table->unsignedTinyInteger('number')->default(5);
            $table->unsignedTinyInteger('type')->default(0);
            $table->string('theme', 60)->default('')->index('theme');
            $table->string('remarks', 30)->default('')->index('remarks');

            $table->index(['filename', 'region'], 'filename');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('template');
    }
};
