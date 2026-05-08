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
        Schema::create('user_feed', function (Blueprint $table) {
            $table->increments('feed_id');
            $table->unsignedInteger('user_id')->default(0);
            $table->unsignedInteger('value_id')->default(0);
            $table->unsignedInteger('goods_id')->default(0);
            $table->unsignedTinyInteger('feed_type')->default(0);
            $table->unsignedTinyInteger('is_feed')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_feed');
    }
};
