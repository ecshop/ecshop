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
        Schema::create('card', function (Blueprint $table) {
            $table->tinyIncrements('card_id');
            $table->string('card_name', 120)->default('');
            $table->string('card_img')->default('');
            $table->decimal('card_fee', 6)->unsigned()->default(0);
            $table->decimal('free_money', 6)->unsigned()->default(0);
            $table->string('card_desc')->default('');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card');
    }
};
