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
        Schema::create('email_sendlist', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('email', 100);
            $table->integer('template_id');
            $table->text('email_content');
            $table->boolean('error')->default(false);
            $table->tinyInteger('pri');
            $table->integer('last_send');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_sendlist');
    }
};
