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
        Schema::create('shipping', function (Blueprint $table) {
            $table->tinyIncrements('shipping_id');
            $table->string('shipping_code', 20)->default('');
            $table->string('shipping_name', 120)->default('');
            $table->string('shipping_desc')->default('');
            $table->string('insure', 10)->default('0');
            $table->unsignedTinyInteger('support_cod')->default(0);
            $table->unsignedTinyInteger('enabled')->default(0);
            $table->text('shipping_print');
            $table->string('print_bg')->nullable();
            $table->text('config_lable')->nullable();
            $table->boolean('print_model')->nullable()->default(false);
            $table->unsignedTinyInteger('shipping_order')->default(0);

            $table->index(['shipping_code', 'enabled'], 'shipping_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping');
    }
};
