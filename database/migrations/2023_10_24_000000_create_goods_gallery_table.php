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
        Schema::create('goods_gallery', function (Blueprint $table) {
            $table->increments('img_id');
            $table->unsignedInteger('goods_id')->default(0)->index('goods_id');
            $table->string('img_url')->default('');
            $table->string('img_desc')->default('');
            $table->string('thumb_url')->default('');
            $table->string('img_original')->default('');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goods_gallery');
    }
};
