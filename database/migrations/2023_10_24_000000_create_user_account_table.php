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
        Schema::create('user_account', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->default(0)->index('user_id');
            $table->string('admin_user');
            $table->decimal('amount', 10);
            $table->integer('add_time')->default(0);
            $table->integer('paid_time')->default(0);
            $table->string('admin_note');
            $table->string('user_note');
            $table->boolean('process_type')->default(false);
            $table->string('payment', 90);
            $table->boolean('is_paid')->default(false)->index('is_paid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_account');
    }
};
