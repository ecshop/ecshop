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
        Schema::create('admin_user', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('user_name', 60)->default('')->index('user_name');
            $table->string('email', 60)->default('');
            $table->string('password', 32)->default('');
            $table->string('ec_salt', 10)->nullable();
            $table->integer('add_time')->default(0);
            $table->integer('last_login')->default(0);
            $table->string('last_ip', 15)->default('');
            $table->text('action_list');
            $table->text('nav_list');
            $table->string('lang_type', 50)->default('');
            $table->unsignedInteger('agency_id')->index('agency_id');
            $table->unsignedInteger('suppliers_id')->nullable()->default(0);
            $table->text('todolist')->nullable();
            $table->integer('role_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_user');
    }
};
