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
        Schema::create('order_action', function (Blueprint $table) {
            $table->increments('action_id');
            $table->unsignedInteger('order_id')->default(0)->index('order_id');
            $table->string('action_user', 30)->default('');
            $table->unsignedTinyInteger('order_status')->default(0);
            $table->unsignedTinyInteger('shipping_status')->default(0);
            $table->unsignedTinyInteger('pay_status')->default(0);
            $table->unsignedTinyInteger('action_place')->default(0);
            $table->string('action_note')->default('');
            $table->unsignedInteger('log_time')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_action');
    }
};
