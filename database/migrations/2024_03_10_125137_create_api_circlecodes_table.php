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
        Schema::create('api_circlecodes', function (Blueprint $table) {
            $table->id();
            $table->integer('api_circle_code_id');
            $table->integer('api_id')->nullable();
            $table->string('api_name')->nullable();
            $table->integer('service_circle_id')->nullable();
            $table->string('circle_name')->nullable();
            $table->string('circle_code')->nullable();
            $table->integer('is_active')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_circlecodes');
    }
};
