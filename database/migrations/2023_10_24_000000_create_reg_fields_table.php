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
        Schema::create('reg_fields', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('reg_field_name', 60);
            $table->unsignedTinyInteger('dis_order')->default(100);
            $table->unsignedTinyInteger('display')->default(1);
            $table->unsignedTinyInteger('type')->default(0);
            $table->unsignedTinyInteger('is_need')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reg_fields');
    }
};
