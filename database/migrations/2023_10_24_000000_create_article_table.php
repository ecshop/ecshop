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
        Schema::create('article', function (Blueprint $table) {
            $table->increments('article_id');
            $table->integer('cat_id')->default(0)->index('cat_id');
            $table->string('title', 150)->default('');
            $table->text('content');
            $table->string('author', 30)->default('');
            $table->string('author_email', 60)->default('');
            $table->string('keywords')->default('');
            $table->unsignedTinyInteger('article_type')->default(2);
            $table->unsignedTinyInteger('is_open')->default(1);
            $table->unsignedInteger('add_time')->default(0);
            $table->string('file_url')->default('');
            $table->unsignedTinyInteger('open_type')->default(0);
            $table->string('link')->default('');
            $table->string('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article');
    }
};
