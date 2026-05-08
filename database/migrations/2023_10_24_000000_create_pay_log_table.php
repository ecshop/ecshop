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
        Schema::create('pay_log', function (Blueprint $table) {
            $table->increments('log_id');
            $table->unsignedInteger('order_id')->default(0);
            $table->decimal('order_amount', 10)->unsigned();
            $table->unsignedTinyInteger('order_type')->default(0);
            $table->unsignedTinyInteger('is_paid')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pay_log');
    }
};
