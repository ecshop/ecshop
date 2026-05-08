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
        Schema::create('user_rank', function (Blueprint $table) {
            $table->tinyIncrements('rank_id');
            $table->string('rank_name', 30)->default('');
            $table->unsignedInteger('min_points')->default(0);
            $table->unsignedInteger('max_points')->default(0);
            $table->unsignedTinyInteger('discount')->default(0);
            $table->unsignedTinyInteger('show_price')->default(1);
            $table->unsignedTinyInteger('special_rank')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_rank');
    }
};
