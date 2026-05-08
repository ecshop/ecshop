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
        Schema::create('area_region', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('shipping_area_id')->default(0);
            $table->unsignedInteger('region_id')->default(0);

            $table->unique(['shipping_area_id', 'region_id'], 'shipping_area_id_region_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('area_region');
    }
};
