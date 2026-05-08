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
        Schema::create('affiliate_log', function (Blueprint $table) {
            $table->integer('log_id', true);
            $table->integer('order_id');
            $table->integer('time');
            $table->integer('user_id');
            $table->string('user_name', 60)->nullable();
            $table->decimal('money', 10)->default(0);
            $table->integer('point')->default(0);
            $table->boolean('separate_type')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affiliate_log');
    }
};
