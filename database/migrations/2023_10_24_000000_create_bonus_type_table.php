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
        Schema::create('bonus_type', function (Blueprint $table) {
            $table->increments('type_id');
            $table->string('type_name', 60)->default('');
            $table->decimal('type_money', 10)->default(0);
            $table->unsignedTinyInteger('send_type')->default(0);
            $table->decimal('min_amount', 10)->unsigned()->default(0);
            $table->decimal('max_amount', 10)->unsigned()->default(0);
            $table->integer('send_start_date')->default(0);
            $table->integer('send_end_date')->default(0);
            $table->integer('use_start_date')->default(0);
            $table->integer('use_end_date')->default(0);
            $table->decimal('min_goods_amount', 10)->unsigned()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bonus_type');
    }
};
