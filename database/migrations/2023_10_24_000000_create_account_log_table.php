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
        Schema::create('account_log', function (Blueprint $table) {
            $table->increments('log_id');
            $table->unsignedInteger('user_id')->index('user_id');
            $table->decimal('user_money', 10);
            $table->decimal('frozen_money', 10);
            $table->integer('rank_points');
            $table->integer('pay_points');
            $table->unsignedInteger('change_time');
            $table->string('change_desc');
            $table->unsignedTinyInteger('change_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account_log');
    }
};
