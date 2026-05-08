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
        Schema::create('attribute', function (Blueprint $table) {
            $table->increments('attr_id');
            $table->unsignedInteger('cat_id')->default(0)->index('cat_id');
            $table->string('attr_name', 60)->default('');
            $table->unsignedTinyInteger('attr_input_type')->default(1);
            $table->unsignedTinyInteger('attr_type')->default(1);
            $table->text('attr_values');
            $table->unsignedTinyInteger('attr_index')->default(0);
            $table->unsignedTinyInteger('sort_order')->default(0);
            $table->unsignedTinyInteger('is_linked')->default(0);
            $table->unsignedTinyInteger('attr_group')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attribute');
    }
};
