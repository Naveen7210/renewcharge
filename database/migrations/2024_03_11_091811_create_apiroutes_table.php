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
        Schema::create('apiroutes', function (Blueprint $table) {
            $table->id();
            $table->integer('route_id');
            $table->string('route_type')->nullable()->default(0);
            $table->enum('route_for',['All', 'Specific'])->nullable()->default('All');
            $table->integer('api_1')->nullable()->default(0);
            $table->string('api_1_name')->nullable();
            $table->integer('api_2')->nullable()->default(0);
            $table->string('api_2_name')->nullable();
            $table->integer('api_3')->nullable()->default(0);
            $table->string('api_3_name')->nullable();
            $table->integer('priority')->nullable();
            $table->integer('is_active')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apiroutes');
    }
};
