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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('email', 60)->default('')->index('email');
            $table->string('user_name', 60)->default('')->unique('user_name');
            $table->string('password', 32)->default('');
            $table->string('question')->default('');
            $table->string('answer')->default('');
            $table->unsignedTinyInteger('sex')->default(0);
            $table->date('birthday')->default('2000-01-01');
            $table->decimal('user_money', 10)->default(0);
            $table->decimal('frozen_money', 10)->default(0);
            $table->unsignedInteger('pay_points')->default(0);
            $table->unsignedInteger('rank_points')->default(0);
            $table->unsignedInteger('address_id')->default(0);
            $table->unsignedInteger('reg_time')->default(0);
            $table->unsignedInteger('last_login')->default(0);
            $table->dateTime('last_time')->default('2000-01-01 00:00:00');
            $table->string('last_ip', 15)->default('');
            $table->unsignedInteger('visit_count')->default(0);
            $table->unsignedTinyInteger('user_rank')->default(0);
            $table->unsignedTinyInteger('is_special')->default(0);
            $table->string('ec_salt', 10)->nullable();
            $table->string('salt', 10)->default('0');
            $table->integer('parent_id')->default(0)->index('parent_id');
            $table->unsignedTinyInteger('flag')->default(0)->index('flag');
            $table->string('alias', 60);
            $table->string('msn', 60);
            $table->string('qq', 20);
            $table->string('office_phone', 20);
            $table->string('home_phone', 20);
            $table->string('mobile_phone', 20);
            $table->unsignedTinyInteger('is_validated')->default(0);
            $table->decimal('credit_line', 10)->unsigned();
            $table->string('passwd_question', 50)->nullable();
            $table->string('passwd_answer')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
