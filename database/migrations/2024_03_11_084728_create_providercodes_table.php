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
        Schema::create('providercodes', function (Blueprint $table) {
            $table->id();
            $table->string('api_provider_code_id');
            $table->integer('api_id')->nullable()->default(0);
            $table->string('api_name')->nullable();
            $table->integer('provider_id')->nullable()->default(0);
            $table->string('provider')->nullable();
            $table->string('provider_code')->nullable();
            $table->integer('is_active')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('providercodes');
    }
};
