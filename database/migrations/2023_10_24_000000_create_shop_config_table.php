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
        Schema::create('shop_config', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('parent_id')->default(0)->index('parent_id');
            $table->string('code', 30)->default('')->unique('code');
            $table->string('type', 10)->default('');
            $table->string('store_range')->default('');
            $table->string('store_dir')->default('');
            $table->text('value');
            $table->unsignedTinyInteger('sort_order')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shop_config');
    }
};
