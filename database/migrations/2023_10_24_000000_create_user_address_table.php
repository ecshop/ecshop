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
        Schema::create('user_address', function (Blueprint $table) {
            $table->increments('address_id');
            $table->string('address_name', 50)->default('');
            $table->unsignedInteger('user_id')->default(0)->index('user_id');
            $table->string('consignee', 60)->default('');
            $table->string('email', 60)->default('');
            $table->integer('country')->default(0);
            $table->integer('province')->default(0);
            $table->integer('city')->default(0);
            $table->integer('district')->default(0);
            $table->string('address', 120)->default('');
            $table->string('zipcode', 60)->default('');
            $table->string('tel', 60)->default('');
            $table->string('mobile', 60)->default('');
            $table->string('sign_building', 120)->default('');
            $table->string('best_time', 120)->default('');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_address');
    }
};
