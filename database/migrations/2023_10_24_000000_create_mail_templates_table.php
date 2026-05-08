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
        Schema::create('mail_templates', function (Blueprint $table) {
            $table->tinyIncrements('template_id');
            $table->string('template_code', 30)->default('')->unique('template_code');
            $table->unsignedTinyInteger('is_html')->default(0);
            $table->string('template_subject', 200)->default('');
            $table->text('template_content');
            $table->unsignedInteger('last_modify')->default(0);
            $table->unsignedInteger('last_send')->default(0);
            $table->string('type', 10)->index('type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mail_templates');
    }
};
