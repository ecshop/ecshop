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
        Schema::create('vote_log', function (Blueprint $table) {
            $table->increments('log_id');
            $table->unsignedInteger('vote_id')->default(0)->index('vote_id');
            $table->string('ip_address', 15)->default('');
            $table->unsignedInteger('vote_time')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vote_log');
    }
};
