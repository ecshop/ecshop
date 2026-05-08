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
        Schema::create('delivery_goods', function (Blueprint $table) {
            $table->increments('rec_id');
            $table->unsignedInteger('delivery_id')->default(0);
            $table->unsignedInteger('goods_id')->default(0)->index('goods_id');
            $table->unsignedInteger('product_id')->nullable()->default(0);
            $table->string('product_sn', 60)->nullable();
            $table->string('goods_name', 120)->nullable();
            $table->string('brand_name', 60)->nullable();
            $table->string('goods_sn', 60)->nullable();
            $table->unsignedTinyInteger('is_real')->nullable()->default(0);
            $table->string('extension_code', 30)->nullable();
            $table->unsignedInteger('parent_id')->nullable()->default(0);
            $table->unsignedInteger('send_number')->nullable()->default(0);
            $table->text('goods_attr')->nullable();

            $table->index(['delivery_id', 'goods_id'], 'delivery_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_goods');
    }
};
