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
        Schema::create('shipping_area', function (Blueprint $table) {
            $table->increments('shipping_area_id');
            $table->string('shipping_area_name', 150)->default('');
            $table->unsignedTinyInteger('shipping_id')->default(0)->index('shipping_id');
            $table->text('configure');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_area');
    }
};
