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
        Schema::create('feedback', function (Blueprint $table) {
            $table->increments('msg_id');
            $table->unsignedInteger('parent_id')->default(0);
            $table->unsignedInteger('user_id')->default(0)->index('user_id');
            $table->string('user_name', 60)->default('');
            $table->string('user_email', 60)->default('');
            $table->string('msg_title', 200)->default('');
            $table->unsignedTinyInteger('msg_type')->default(0);
            $table->unsignedTinyInteger('msg_status')->default(0);
            $table->text('msg_content');
            $table->unsignedInteger('msg_time')->default(0);
            $table->string('message_img')->default('0');
            $table->unsignedInteger('order_id')->default(0);
            $table->unsignedTinyInteger('msg_area')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
