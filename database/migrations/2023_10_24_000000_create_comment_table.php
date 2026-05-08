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
        Schema::create('comment', function (Blueprint $table) {
            $table->increments('comment_id');
            $table->unsignedTinyInteger('comment_type')->default(0);
            $table->unsignedInteger('id_value')->default(0)->index('id_value');
            $table->string('email', 60)->default('');
            $table->string('user_name', 60)->default('');
            $table->text('content');
            $table->unsignedTinyInteger('comment_rank')->default(0);
            $table->unsignedInteger('add_time')->default(0);
            $table->string('ip_address', 15)->default('');
            $table->unsignedTinyInteger('status')->default(0);
            $table->unsignedInteger('parent_id')->default(0)->index('parent_id');
            $table->unsignedInteger('user_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment');
    }
};
