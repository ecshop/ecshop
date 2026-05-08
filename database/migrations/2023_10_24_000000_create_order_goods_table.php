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
        Schema::create('order_goods', function (Blueprint $table) {
            $table->increments('rec_id');
            $table->unsignedInteger('order_id')->default(0)->index('order_id');
            $table->unsignedInteger('goods_id')->default(0)->index('goods_id');
            $table->string('goods_name', 120)->default('');
            $table->string('goods_sn', 60)->default('');
            $table->unsignedInteger('product_id')->default(0);
            $table->unsignedInteger('goods_number')->default(1);
            $table->decimal('market_price', 10)->default(0);
            $table->decimal('goods_price', 10)->default(0);
            $table->text('goods_attr');
            $table->unsignedInteger('send_number')->default(0);
            $table->unsignedTinyInteger('is_real')->default(0);
            $table->string('extension_code', 30)->default('');
            $table->unsignedInteger('parent_id')->default(0);
            $table->unsignedInteger('is_gift')->default(0);
            $table->string('goods_attr_id')->default('');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_goods');
    }
};
