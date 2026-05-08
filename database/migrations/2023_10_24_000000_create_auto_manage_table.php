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
        Schema::create('auto_manage', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id');
            $table->string('type', 10);
            $table->integer('starttime');
            $table->integer('endtime');

            $table->unique(['item_id', 'type'], 'item_id_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auto_manage');
    }
};
