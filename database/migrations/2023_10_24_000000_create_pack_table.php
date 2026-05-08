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
        Schema::create('pack', function (Blueprint $table) {
            $table->tinyIncrements('pack_id');
            $table->string('pack_name', 120)->default('');
            $table->string('pack_img')->default('');
            $table->decimal('pack_fee', 6)->unsigned()->default(0);
            $table->unsignedInteger('free_money')->default(0);
            $table->string('pack_desc')->default('');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pack');
    }
};
