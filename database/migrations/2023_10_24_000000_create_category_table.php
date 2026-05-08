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
        Schema::create('category', function (Blueprint $table) {
            $table->increments('cat_id');
            $table->string('cat_name', 90)->default('');
            $table->string('keywords')->default('');
            $table->string('cat_desc')->default('');
            $table->unsignedInteger('parent_id')->default(0)->index('parent_id');
            $table->unsignedTinyInteger('sort_order')->default(50);
            $table->string('template_file', 50)->default('');
            $table->string('measure_unit', 15)->default('');
            $table->boolean('show_in_nav')->default(false);
            $table->string('style', 150);
            $table->unsignedTinyInteger('is_show')->default(1);
            $table->tinyInteger('grade')->default(0);
            $table->string('filter_attr')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category');
    }
};
