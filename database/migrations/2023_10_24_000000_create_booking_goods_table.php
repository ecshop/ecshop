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
        Schema::create('booking_goods', function (Blueprint $table) {
            $table->increments('rec_id');
            $table->unsignedInteger('user_id')->default(0)->index('user_id');
            $table->string('email', 60)->default('');
            $table->string('link_man', 60)->default('');
            $table->string('tel', 60)->default('');
            $table->unsignedInteger('goods_id')->default(0);
            $table->string('goods_desc')->default('');
            $table->unsignedInteger('goods_number')->default(0);
            $table->unsignedInteger('booking_time')->default(0);
            $table->unsignedTinyInteger('is_dispose')->default(0);
            $table->string('dispose_user', 30)->default('');
            $table->unsignedInteger('dispose_time')->default(0);
            $table->string('dispose_note')->default('');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_goods');
    }
};
