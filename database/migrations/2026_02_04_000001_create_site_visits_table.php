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
        Schema::create('site_visits', function (Blueprint $table) {
            $table->id();
            $table->string('session_id')->nullable();
            $table->string('ip')->nullable();
            $table->string('path');
            $table->string('method', 10)->default('GET');
            $table->string('user_agent')->nullable();
            $table->string('referer')->nullable();
            $table->timestamps();

            $table->index('path');
            $table->index('ip');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_visits');
    }
};
