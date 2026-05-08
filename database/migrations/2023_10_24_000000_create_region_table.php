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
        Schema::create('region', function (Blueprint $table) {
            $table->increments('region_id');
            $table->unsignedInteger('parent_id')->default(0)->index('parent_id');
            $table->string('region_name', 120)->default('');
            $table->boolean('region_type')->default(false)->index('region_type');
            $table->unsignedInteger('agency_id')->default(0)->index('agency_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('region');
    }
};
