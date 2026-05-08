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
        Schema::create('admin_message', function (Blueprint $table) {
            $table->increments('message_id');
            $table->unsignedTinyInteger('sender_id')->default(0);
            $table->unsignedTinyInteger('receiver_id')->default(0)->index('receiver_id');
            $table->unsignedInteger('sent_time')->default(0);
            $table->unsignedInteger('read_time')->default(0);
            $table->unsignedTinyInteger('readed')->default(0);
            $table->unsignedTinyInteger('deleted')->default(0);
            $table->string('title', 150)->default('');
            $table->text('message');

            $table->index(['sender_id', 'receiver_id'], 'sender_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_message');
    }
};
