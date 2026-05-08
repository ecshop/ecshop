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
        Schema::create('user_bonus', function (Blueprint $table) {
            $table->increments('bonus_id');
            $table->unsignedTinyInteger('bonus_type_id')->default(0);
            $table->unsignedBigInteger('bonus_sn')->default(0);
            $table->unsignedInteger('user_id')->default(0)->index('user_id');
            $table->unsignedInteger('used_time')->default(0);
            $table->unsignedInteger('order_id')->default(0);
            $table->unsignedTinyInteger('emailed')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_bonus');
    }
};
