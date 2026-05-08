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
        Schema::create('member_price', function (Blueprint $table) {
            $table->increments('price_id');
            $table->unsignedInteger('goods_id')->default(0);
            $table->tinyInteger('user_rank')->default(0);
            $table->decimal('user_price', 10)->default(0);

            $table->index(['goods_id', 'user_rank'], 'goods_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_price');
    }
};
