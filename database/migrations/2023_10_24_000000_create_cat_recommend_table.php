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
        Schema::create('cat_recommend', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cat_id');
            $table->boolean('recommend_type');

            $table->unique(['cat_id', 'recommend_type'], 'cat_id_recommend_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cat_recommend');
    }
};
