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
        Schema::create('circle_codes', function (Blueprint $table) {
            $table->id();
            $table->integer('circlecode_id')->nullable()->default(0);
            $table->integer('api_id')->nullable()->default(0);
            $table->integer('service_id')->nullable()->default(0);
            $table->integer('provider_id')->nullable()->default(0);
            $table->integer('sp_code_id')->nullable()->default(0);
            $table->string('circle_code');
            $table->integer('circle_code_id')->nullable()->default(0);
            $table->integer('is_active')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('circle_codes');
    }
};
