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
        Schema::create('goods_attr', function (Blueprint $table) {
            $table->increments('goods_attr_id');
            $table->unsignedInteger('goods_id')->default(0)->index('goods_id');
            $table->unsignedInteger('attr_id')->default(0)->index('attr_id');
            $table->text('attr_value');
            $table->string('attr_price')->default('');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goods_attr');
    }
};
