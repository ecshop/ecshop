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
        Schema::create('virtual_card', function (Blueprint $table) {
            $table->integer('card_id', true);
            $table->unsignedInteger('goods_id')->default(0)->index('goods_id');
            $table->string('card_sn', 60)->default('')->index('car_sn');
            $table->string('card_password', 60)->default('');
            $table->integer('add_date')->default(0);
            $table->integer('end_date')->default(0);
            $table->boolean('is_saled')->default(false)->index('is_saled');
            $table->string('order_sn', 20)->default('');
            $table->string('crc32', 12)->default('0');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('virtual_card');
    }
};
