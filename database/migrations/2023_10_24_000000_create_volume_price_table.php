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
        Schema::create('volume_price', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedTinyInteger('price_type');
            $table->unsignedInteger('goods_id');
            $table->unsignedInteger('volume_number')->default(0);
            $table->decimal('volume_price', 10)->default(0);

            $table->unique(['price_type', 'goods_id', 'volume_number'], 'price_type_goods_id_volume_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volume_price');
    }
};
