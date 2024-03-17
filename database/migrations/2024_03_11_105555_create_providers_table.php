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
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->string('provider_id');
            $table->integer('api_id')->nullable()->default(0);
            $table->string('api_name')->nullable();
            $table->integer('service_id')->nullable()->default(0);
            $table->integer('service')->nullable();
            $table->integer('providerid')->nullable();
            $table->string('provider')->nullable();
            $table->string('logo')->nullable();
            $table->string('state')->nullable();
            $table->double('commission_amount')->nullable()->default(0);
            $table->double('commission_percentage')->nullable()->default(0);
            $table->integer('is_active')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('providers');
    }
};
