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
        Schema::create('stats', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('access_time')->default(0)->index('access_time');
            $table->string('ip_address', 15)->default('');
            $table->unsignedInteger('visit_times')->default(1);
            $table->string('browser', 60)->default('');
            $table->string('system', 20)->default('');
            $table->string('language', 20)->default('');
            $table->string('area', 30)->default('');
            $table->string('referer_domain', 100)->default('');
            $table->string('referer_path', 200)->default('');
            $table->string('access_url')->default('');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stats');
    }
};
