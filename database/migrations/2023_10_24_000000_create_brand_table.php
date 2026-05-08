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
        Schema::create('brand', function (Blueprint $table) {
            $table->increments('brand_id');
            $table->string('brand_name', 60)->default('');
            $table->string('brand_logo', 80)->default('');
            $table->text('brand_desc');
            $table->string('site_url')->default('');
            $table->unsignedTinyInteger('sort_order')->default(50);
            $table->unsignedTinyInteger('is_show')->default(1)->index('is_show');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brand');
    }
};
