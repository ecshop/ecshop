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
        Schema::create('ad_custom', function (Blueprint $table) {
            $table->increments('ad_id');
            $table->unsignedTinyInteger('ad_type')->default(1);
            $table->string('ad_name', 60)->nullable();
            $table->unsignedInteger('add_time')->default(0);
            $table->text('content')->nullable();
            $table->string('url')->nullable();
            $table->unsignedTinyInteger('ad_status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ad_custom');
    }
};
