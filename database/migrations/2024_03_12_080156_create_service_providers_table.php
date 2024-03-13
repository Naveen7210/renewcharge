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
        Schema::create('service_providers', function (Blueprint $table) {
            $table->id();
            $table->integer('service_provider_id')->nullable()->default(0);
            $table->integer('api_id')->nullable()->default(0);
            $table->integer('service_id')->nullable()->default(0);
            $table->integer('provider_id');
            $table->integer('sp_code_id');
            $table->integer('sp_code')->nullable()->default(0);
            $table->integer('is_active')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_providers');
    }
};
