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
        Schema::create('vote_option', function (Blueprint $table) {
            $table->increments('option_id');
            $table->unsignedInteger('vote_id')->default(0)->index('vote_id');
            $table->string('option_name', 250)->default('');
            $table->unsignedInteger('option_count')->default(0);
            $table->unsignedTinyInteger('option_order')->default(100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vote_option');
    }
};
