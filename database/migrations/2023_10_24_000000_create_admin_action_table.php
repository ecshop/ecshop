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
        Schema::create('admin_action', function (Blueprint $table) {
            $table->tinyIncrements('action_id');
            $table->unsignedTinyInteger('parent_id')->default(0)->index('parent_id');
            $table->string('action_code', 20)->default('');
            $table->string('relevance', 20)->default('');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_action');
    }
};
