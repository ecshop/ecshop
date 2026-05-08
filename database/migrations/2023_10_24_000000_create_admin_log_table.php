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
        Schema::create('admin_log', function (Blueprint $table) {
            $table->increments('log_id');
            $table->unsignedInteger('log_time')->default(0)->index('log_time');
            $table->unsignedTinyInteger('user_id')->default(0)->index('user_id');
            $table->string('log_info')->default('');
            $table->string('ip_address', 15)->default('');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_log');
    }
};
