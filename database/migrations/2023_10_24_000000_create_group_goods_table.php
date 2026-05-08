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
        Schema::create('group_goods', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('parent_id')->default(0);
            $table->unsignedInteger('goods_id')->default(0);
            $table->decimal('goods_price', 10)->unsigned()->default(0);
            $table->unsignedTinyInteger('admin_id')->default(0);

            $table->unique(['parent_id', 'goods_id', 'admin_id'], 'parent_id_goods_id_admin_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_goods');
    }
};
