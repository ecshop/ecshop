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
        Schema::create('order_info', function (Blueprint $table) {
            $table->increments('order_id');
            $table->string('order_sn', 20)->default('')->unique('order_sn');
            $table->unsignedInteger('user_id')->default(0)->index('user_id');
            $table->unsignedTinyInteger('order_status')->default(0)->index('order_status');
            $table->unsignedTinyInteger('shipping_status')->default(0)->index('shipping_status');
            $table->unsignedTinyInteger('pay_status')->default(0)->index('pay_status');
            $table->string('consignee', 60)->default('');
            $table->unsignedInteger('country')->default(0);
            $table->unsignedInteger('province')->default(0);
            $table->unsignedInteger('city')->default(0);
            $table->unsignedInteger('district')->default(0);
            $table->string('address')->default('');
            $table->string('zipcode', 60)->default('');
            $table->string('tel', 60)->default('');
            $table->string('mobile', 60)->default('');
            $table->string('email', 60)->default('');
            $table->string('best_time', 120)->default('');
            $table->string('sign_building', 120)->default('');
            $table->string('postscript')->default('');
            $table->tinyInteger('shipping_id')->default(0)->index('shipping_id');
            $table->string('shipping_name', 120)->default('');
            $table->tinyInteger('pay_id')->default(0)->index('pay_id');
            $table->string('pay_name', 120)->default('');
            $table->string('how_oos', 120)->default('');
            $table->string('how_surplus', 120)->default('');
            $table->string('pack_name', 120)->default('');
            $table->string('card_name', 120)->default('');
            $table->string('card_message')->default('');
            $table->string('inv_payee', 120)->default('');
            $table->string('inv_content', 120)->default('');
            $table->decimal('goods_amount', 10)->default(0);
            $table->decimal('shipping_fee', 10)->default(0);
            $table->decimal('insure_fee', 10)->default(0);
            $table->decimal('pay_fee', 10)->default(0);
            $table->decimal('pack_fee', 10)->default(0);
            $table->decimal('card_fee', 10)->default(0);
            $table->decimal('money_paid', 10)->default(0);
            $table->decimal('surplus', 10)->default(0);
            $table->unsignedInteger('integral')->default(0);
            $table->decimal('integral_money', 10)->default(0);
            $table->decimal('bonus', 10)->default(0);
            $table->decimal('order_amount', 10)->default(0);
            $table->integer('from_ad')->default(0);
            $table->string('referer')->default('');
            $table->unsignedInteger('add_time')->default(0);
            $table->unsignedInteger('confirm_time')->default(0);
            $table->unsignedInteger('pay_time')->default(0);
            $table->unsignedInteger('shipping_time')->default(0);
            $table->unsignedTinyInteger('pack_id')->default(0);
            $table->unsignedTinyInteger('card_id')->default(0);
            $table->unsignedInteger('bonus_id')->default(0);
            $table->string('invoice_no')->default('');
            $table->string('extension_code', 30)->default('');
            $table->unsignedInteger('extension_id')->default(0);
            $table->string('to_buyer')->default('');
            $table->string('pay_note')->default('');
            $table->unsignedInteger('agency_id')->index('agency_id');
            $table->string('inv_type', 60);
            $table->decimal('tax', 10);
            $table->boolean('is_separate')->default(false);
            $table->unsignedInteger('parent_id')->default(0);
            $table->decimal('discount', 10);

            $table->index(['extension_code', 'extension_id'], 'extension_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_info');
    }
};
