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
        Schema::create('payment', function (Blueprint $table) {
            $table->tinyIncrements('pay_id');
            $table->string('pay_code', 20)->default('')->unique('pay_code');
            $table->string('pay_name', 120)->default('');
            $table->string('pay_fee', 10)->default('0');
            $table->text('pay_desc');
            $table->unsignedTinyInteger('pay_order')->default(0);
            $table->text('pay_config');
            $table->unsignedTinyInteger('enabled')->default(0);
            $table->unsignedTinyInteger('is_cod')->default(0);
            $table->unsignedTinyInteger('is_online')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment');
    }
};
