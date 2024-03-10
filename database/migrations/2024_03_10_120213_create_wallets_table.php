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
        Schema::create('wallets', function (Blueprint $table) {
            $table->id();
            $table->integer('wallet_id');
            $table->integer('parent_id')->default(0);
            $table->integer('parent_user_id')->nullable();
            $table->integer('white_label_user_id');
            $table->integer('api_id')->default(0);
            $table->string('api_name')->nullable();
            $table->integer('user_id')->default(0);
            $table->string('user_name')->nullable();
            $table->integer('user_1_id')->default(0);
            $table->string('user_1_name')->nullable();
            $table->enum('transaction_type',['API Top up','Send Money','Recieve Money','Recharge','Reverse','Commission','Refund','R Offer Check','User Info Check','Plan Purchase','Payment Gateway']);
            $table->enum('wallet_type',['Wallet','Commission','Mixed']);
            $table->enum('cash_credit',['Cash','Credit','Debit']);
            $table->string('api_old_balance')->default(0);
            $table->string('api_amount')->default(0);
            $table->string('api_new_balance')->default(0);
            $table->string('user_old_balance')->default(0);
            $table->double('total_amount')->default(0);
            $table->string('amount')->default(0);
            $table->string('user_new_balance')->default(0);
            $table->text('transaction_details')->nullable();
            $table->string('transaction_date')->nullable();
            $table->string('month_year')->nullable();
            $table->integer('provider_id')->nullable();
            $table->string('provider_name')->nullable();
            $table->string('provider_type')->nullable();
            $table->integer('circle_id')->nullable();
            $table->string('circle_name')->nullable();
            $table->string('mobile_number')->nullable();
            $table->enum('status',['Success','Pending','Failed','InQueue']);
            $table->enum('disputed',['Yes','No','Resolved','Rejected']);
            $table->string('ref_number')->nullable();
            $table->string('api_number')->nullable();
            $table->string('opid')->nullable();
            $table->text('comment')->nullable();
            $table->text('api_response')->nullable();
            $table->double('commission_rt')->nullable();
            $table->string('total_commission')->nullable();
            $table->string('commission_earned')->nullable();
            $table->float('gst')->nullable();
            $table->float('tds')->nullable();
            $table->enum('recharge_path',['Web','App','Api']);
            $table->string('recharge_url')->nullable();
            $table->string('ip_address')->nullable();
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
        Schema::dropIfExists('wallets');
    }
};
