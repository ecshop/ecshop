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
        Schema::create('wholesale', function (Blueprint $table) {
            $table->increments('act_id');
            $table->unsignedInteger('goods_id')->index('goods_id');
            $table->string('goods_name');
            $table->string('rank_ids');
            $table->text('prices');
            $table->unsignedTinyInteger('enabled');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wholesale');
    }
};
