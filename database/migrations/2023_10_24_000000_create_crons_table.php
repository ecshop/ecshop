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
        Schema::create('crons', function (Blueprint $table) {
            $table->tinyIncrements('cron_id');
            $table->string('cron_code', 20)->index('cron_code');
            $table->string('cron_name', 120);
            $table->text('cron_desc')->nullable();
            $table->unsignedTinyInteger('cron_order')->default(0);
            $table->text('cron_config');
            $table->integer('thistime')->default(0);
            $table->integer('nextime')->index('nextime');
            $table->tinyInteger('day');
            $table->string('week', 1);
            $table->string('hour', 2);
            $table->string('minute');
            $table->boolean('enable')->default(true)->index('enable');
            $table->boolean('run_once')->default(false);
            $table->string('allow_ip', 100)->default('');
            $table->string('alow_files');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crons');
    }
};
