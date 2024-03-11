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
        Schema::create('recharges', function (Blueprint $table) {
            $table->id();
            $table->integer('recharge_id')->nullable();
            $table->dateTime('date')->nullable();
            $table->string('mobileno')->nullable();
            $table->integer('service_id')->nullable()->default(0);
            $table->integer('service')->nullable();
            $table->integer('service_provider_id')->nullable();
            $table->string('service_provider')->nullable();
            $table->integer('circlecode_id')->nullable();
            $table->string('circlecode')->nullable();
            $table->integer('amount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recharges');
    }
};
