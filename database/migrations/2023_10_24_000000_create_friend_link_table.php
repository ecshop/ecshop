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
        Schema::create('friend_link', function (Blueprint $table) {
            $table->increments('link_id');
            $table->string('link_name')->default('');
            $table->string('link_url')->default('');
            $table->string('link_logo')->default('');
            $table->unsignedTinyInteger('show_order')->default(50)->index('show_order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('friend_link');
    }
};
