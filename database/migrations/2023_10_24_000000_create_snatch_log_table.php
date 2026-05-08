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
        Schema::create('snatch_log', function (Blueprint $table) {
            $table->increments('log_id');
            $table->unsignedTinyInteger('snatch_id')->default(0)->index('snatch_id');
            $table->unsignedInteger('user_id')->default(0);
            $table->decimal('bid_price', 10)->default(0);
            $table->unsignedInteger('bid_time')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('snatch_log');
    }
};
