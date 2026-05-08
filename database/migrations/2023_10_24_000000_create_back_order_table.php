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
        Schema::create('back_order', function (Blueprint $table) {
            $table->increments('back_id');
            $table->string('delivery_sn', 20);
            $table->string('order_sn', 20);
            $table->unsignedInteger('order_id')->default(0)->index('order_id');
            $table->string('invoice_no', 50)->nullable();
            $table->unsignedInteger('add_time')->nullable()->default(0);
            $table->unsignedTinyInteger('shipping_id')->nullable()->default(0);
            $table->string('shipping_name', 120)->nullable();
            $table->unsignedInteger('user_id')->nullable()->default(0)->index('user_id');
            $table->string('action_user', 30)->nullable();
            $table->string('consignee', 60)->nullable();
            $table->string('address', 250)->nullable();
            $table->unsignedInteger('country')->nullable()->default(0);
            $table->unsignedInteger('province')->nullable()->default(0);
            $table->unsignedInteger('city')->nullable()->default(0);
            $table->unsignedInteger('district')->nullable()->default(0);
            $table->string('sign_building', 120)->nullable();
            $table->string('email', 60)->nullable();
            $table->string('zipcode', 60)->nullable();
            $table->string('tel', 60)->nullable();
            $table->string('mobile', 60)->nullable();
            $table->string('best_time', 120)->nullable();
            $table->string('postscript')->nullable();
            $table->string('how_oos', 120)->nullable();
            $table->decimal('insure_fee', 10)->unsigned()->nullable()->default(0);
            $table->decimal('shipping_fee', 10)->unsigned()->nullable()->default(0);
            $table->unsignedInteger('update_time')->nullable()->default(0);
            $table->integer('suppliers_id')->nullable()->default(0);
            $table->unsignedTinyInteger('status')->default(0);
            $table->unsignedInteger('return_time')->nullable()->default(0);
            $table->unsignedInteger('agency_id')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('back_order');
    }
};
