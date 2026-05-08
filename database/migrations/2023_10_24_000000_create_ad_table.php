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
        Schema::create('ad', function (Blueprint $table) {
            $table->increments('ad_id');
            $table->unsignedInteger('position_id')->default(0)->index('position_id');
            $table->unsignedTinyInteger('media_type')->default(0);
            $table->string('ad_name', 60)->default('');
            $table->string('ad_link')->default('');
            $table->text('ad_code');
            $table->integer('start_time')->default(0);
            $table->integer('end_time')->default(0);
            $table->string('link_man', 60)->default('');
            $table->string('link_email', 60)->default('');
            $table->string('link_phone', 60)->default('');
            $table->unsignedInteger('click_count')->default(0);
            $table->unsignedTinyInteger('enabled')->default(1)->index('enabled');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ad');
    }
};
