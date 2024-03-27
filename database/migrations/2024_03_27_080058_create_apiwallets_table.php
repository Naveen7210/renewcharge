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
        Schema::create('apiwallets', function (Blueprint $table) {
            $table->id();
            $table->integer('api_id')->default(0);
            $table->string('api_name')->nullable();
            $table->integer('user_id')->default(0)->nullable();
            $table->string('user_name')->nullable();
            $table->enum('wallet_type',['Wallet','Commission','Mixed'])->nullable();
            $table->enum('cash_credit',['Cash','Credit','Debit'])->nullable();
            $table->string('api_old_balance')->default(0)->nullable();
            $table->string('api_amount')->default(0)->nullable();
            $table->string('api_new_balance')->default(0);
            $table->double('total_amount')->default(0)->nullable();
            $table->string('amount')->default(0)->nullable();
            $table->text('transaction_details')->nullable();
            $table->string('transaction_date')->nullable();
            $table->string('mobile_number')->nullable();
            $table->enum('status',['Success','Pending','Failed','InQueue'])->nullable();
            $table->enum('disputed',['Yes','No','Resolved','Rejected'])->nullable();
            $table->string('ref_number')->nullable();
            $table->string('api_number')->nullable();
            $table->text('comment')->nullable();
            $table->text('api_response')->nullable();
            $table->double('commission_rt')->nullable();
            $table->string('total_commission')->nullable();
            $table->string('commission_earned')->nullable();
            $table->float('gst')->nullable();
            $table->float('tds')->nullable();
            $table->integer('is_active')->default(0);
            $table->text('response_url')->nullable();
            $table->integer('call_back_status')->default(0);
            $table->text('api_call_back_response')->nullable();
            $table->string('send_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apiwallets');
    }
};
