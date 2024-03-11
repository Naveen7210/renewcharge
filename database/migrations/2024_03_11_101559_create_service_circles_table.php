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
        Schema::create('service_circles', function (Blueprint $table) {
            $table->id();
            $table->integer('service_circle_id');
            $table->string('circle_name');
            $table->string('tiptopmoney_code');
            $table->integer('is_active')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_circles');
    }
};
