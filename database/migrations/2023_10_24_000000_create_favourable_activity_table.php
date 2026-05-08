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
        Schema::create('favourable_activity', function (Blueprint $table) {
            $table->increments('act_id');
            $table->string('act_name')->index('act_name');
            $table->unsignedInteger('start_time');
            $table->unsignedInteger('end_time');
            $table->string('user_rank');
            $table->unsignedTinyInteger('act_range');
            $table->string('act_range_ext');
            $table->decimal('min_amount', 10)->unsigned();
            $table->decimal('max_amount', 10)->unsigned();
            $table->unsignedTinyInteger('act_type');
            $table->decimal('act_type_ext', 10)->unsigned();
            $table->text('gift');
            $table->unsignedTinyInteger('sort_order')->default(50);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favourable_activity');
    }
};
