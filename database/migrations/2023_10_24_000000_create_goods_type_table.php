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
        Schema::create('goods_type', function (Blueprint $table) {
            $table->increments('cat_id');
            $table->string('cat_name', 60)->default('');
            $table->unsignedTinyInteger('enabled')->default(1);
            $table->string('attr_group');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goods_type');
    }
};
