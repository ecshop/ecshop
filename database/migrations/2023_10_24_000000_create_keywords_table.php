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
        Schema::create('keywords', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date')->default('2000-01-01');
            $table->string('searchengine', 20)->default('');
            $table->string('keyword', 90)->default('');
            $table->unsignedInteger('count')->default(0);

            $table->unique(['date', 'searchengine', 'keyword'], 'date_searchengine_keyword');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keywords');
    }
};
