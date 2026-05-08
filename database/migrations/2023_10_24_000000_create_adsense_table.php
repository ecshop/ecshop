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
        Schema::create('adsense', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('from_ad')->default(0)->index('from_ad');
            $table->string('referer')->default('');
            $table->unsignedInteger('clicks')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adsense');
    }
};
