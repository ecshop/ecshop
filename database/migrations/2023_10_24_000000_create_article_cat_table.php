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
        Schema::create('article_cat', function (Blueprint $table) {
            $table->integer('cat_id', true);
            $table->string('cat_name')->default('');
            $table->unsignedTinyInteger('cat_type')->default(1)->index('cat_type');
            $table->string('keywords')->default('');
            $table->string('cat_desc')->default('');
            $table->unsignedTinyInteger('sort_order')->default(50)->index('sort_order');
            $table->unsignedTinyInteger('show_in_nav')->default(0);
            $table->unsignedInteger('parent_id')->default(0)->index('parent_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_cat');
    }
};
