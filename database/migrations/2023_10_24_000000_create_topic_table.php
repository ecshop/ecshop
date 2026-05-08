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
        Schema::create('topic', function (Blueprint $table) {
            $table->increments('topic_id')->index('topic_id');
            $table->string('title')->default('\'\'');
            $table->text('intro');
            $table->integer('start_time')->default(0);
            $table->integer('end_time')->default(0);
            $table->text('data');
            $table->string('template')->default('\'\'');
            $table->text('css');
            $table->string('topic_img')->nullable();
            $table->string('title_pic')->nullable();
            $table->char('base_style', 6)->nullable();
            $table->text('htmls')->nullable();
            $table->string('keywords')->nullable();
            $table->string('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topic');
    }
};
