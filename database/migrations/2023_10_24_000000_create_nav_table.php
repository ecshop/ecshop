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
        Schema::create('nav', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('ctype', 10)->nullable();
            $table->unsignedInteger('cid')->nullable();
            $table->string('name');
            $table->boolean('ifshow')->index('ifshow');
            $table->boolean('vieworder');
            $table->boolean('opennew');
            $table->string('url');
            $table->string('type', 10)->index('type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nav');
    }
};
