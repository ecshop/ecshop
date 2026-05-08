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
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('goods_id');
            $table->unsignedInteger('cat_id')->default(0)->index('cat_id');
            $table->string('goods_sn', 60)->default('')->index('goods_sn');
            $table->string('goods_name', 120)->default('');
            $table->string('goods_name_style', 60)->default('+');
            $table->unsignedInteger('click_count')->default(0);
            $table->unsignedInteger('brand_id')->default(0)->index('brand_id');
            $table->string('provider_name', 100)->default('');
            $table->unsignedInteger('goods_number')->default(0)->index('goods_number');
            $table->decimal('goods_weight', 10, 3)->unsigned()->default(0)->index('goods_weight');
            $table->decimal('market_price', 10)->unsigned()->default(0);
            $table->decimal('shop_price', 10)->unsigned()->default(0);
            $table->decimal('promote_price', 10)->unsigned()->default(0);
            $table->unsignedInteger('promote_start_date')->default(0)->index('promote_start_date');
            $table->unsignedInteger('promote_end_date')->default(0)->index('promote_end_date');
            $table->unsignedTinyInteger('warn_number')->default(1);
            $table->string('keywords')->default('');
            $table->string('goods_brief')->default('');
            $table->text('goods_desc');
            $table->string('goods_thumb')->default('');
            $table->string('goods_img')->default('');
            $table->string('original_img')->default('');
            $table->unsignedTinyInteger('is_real')->default(1);
            $table->string('extension_code', 30)->default('');
            $table->unsignedTinyInteger('is_on_sale')->default(1);
            $table->unsignedTinyInteger('is_alone_sale')->default(1);
            $table->unsignedTinyInteger('is_shipping')->default(0);
            $table->unsignedInteger('integral')->default(0);
            $table->unsignedInteger('add_time')->default(0);
            $table->unsignedInteger('sort_order')->default(100)->index('sort_order');
            $table->unsignedTinyInteger('is_delete')->default(0);
            $table->unsignedTinyInteger('is_best')->default(0);
            $table->unsignedTinyInteger('is_new')->default(0);
            $table->unsignedTinyInteger('is_hot')->default(0);
            $table->unsignedTinyInteger('is_promote')->default(0);
            $table->unsignedTinyInteger('bonus_type_id')->default(0);
            $table->unsignedInteger('last_update')->default(0)->index('last_update');
            $table->unsignedInteger('goods_type')->default(0);
            $table->string('seller_note')->default('');
            $table->integer('give_integral')->default(-1);
            $table->integer('rank_integral')->default(-1);
            $table->unsignedInteger('suppliers_id')->nullable();
            $table->unsignedTinyInteger('is_check')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goods');
    }
};
