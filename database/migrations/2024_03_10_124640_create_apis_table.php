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
        Schema::create('apis', function (Blueprint $table) {
            $table->id();
            $table->integer('api_id');
            $table->string('user_id');
            $table->enum('api_type',['Recharge', 'Other'])->default('Recharge');
            $table->string('api_name')->nullable();
            $table->string('api_username')->nullable();
            $table->string('api_password')->nullable();
            $table->string('api_key')->nullable();
            $table->string('api_domain')->nullable();
            $table->double('api_balance')->nullable();
            $table->string('security_key')->nullable();
            $table->string('corporate_id')->nullable();
            $table->string('md_key')->nullable();
            $table->integer('is_active')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apis');
    }
};
