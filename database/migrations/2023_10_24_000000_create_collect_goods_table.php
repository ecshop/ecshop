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
        Schema::create('collect_goods', function (Blueprint $table) {
            $table->increments('rec_id');
            $table->unsignedInteger('user_id')->default(0)->index('user_id');
            $table->unsignedInteger('goods_id')->default(0)->index('goods_id');
            $table->unsignedInteger('add_time')->default(0);
            $table->boolean('is_attention')->default(false)->index('is_attention');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collect_goods');
    }
};
