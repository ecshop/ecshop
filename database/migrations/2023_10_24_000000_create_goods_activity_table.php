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
        Schema::create('goods_activity', function (Blueprint $table) {
            $table->increments('act_id');
            $table->string('act_name');
            $table->text('act_desc');
            $table->unsignedTinyInteger('act_type');
            $table->unsignedInteger('goods_id');
            $table->unsignedInteger('product_id')->default(0);
            $table->string('goods_name');
            $table->unsignedInteger('start_time');
            $table->unsignedInteger('end_time');
            $table->unsignedTinyInteger('is_finished');
            $table->text('ext_info');

            $table->index(['act_name', 'act_type', 'goods_id'], 'act_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goods_activity');
    }
};
