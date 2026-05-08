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
        Schema::create('ad_position', function (Blueprint $table) {
            $table->tinyIncrements('position_id');
            $table->string('position_name', 60)->default('');
            $table->unsignedInteger('ad_width')->default(0);
            $table->unsignedInteger('ad_height')->default(0);
            $table->string('position_desc')->default('');
            $table->text('position_style');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ad_position');
    }
};
