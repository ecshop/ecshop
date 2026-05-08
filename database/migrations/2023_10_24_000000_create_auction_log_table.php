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
        Schema::create('auction_log', function (Blueprint $table) {
            $table->increments('log_id');
            $table->unsignedInteger('act_id')->index('act_id');
            $table->unsignedInteger('bid_user');
            $table->decimal('bid_price', 10)->unsigned();
            $table->unsignedInteger('bid_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auction_log');
    }
};
