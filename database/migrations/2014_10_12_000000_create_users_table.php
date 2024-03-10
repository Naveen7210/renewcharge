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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->integer('parent_id');
            $table->integer('white_label_id');
            $table->enum('user_type',['Admin','Master Distributor','Distributor','Retailer','Sales','Support','API Partner','Whitelabel User','API User','DSE']);
            $table->integer('plan_id');
            $table->string('user_name')->unique();
            $table->string('name');
            $table->enum('gender',['Male','Female'])->default('Male');
            $table->date('dob')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('mobile')->unique();
            $table->string('mobile_1')->nullable();
            $table->integer('otp');
            $table->integer('mobile_otp');
            $table->integer('email_otp');
            $table->string('password');
            $table->string('login_ip');
            $table->datetime('last_login');
            $table->string('pincode')->nullable();
            $table->string('district')->nullable();
            $table->string('state')->nullable();
            $table->string('user_address')->nullable();
            $table->double('amount_balance')->nullable();
            $table->double('commission_amount')->default(0);
            $table->double('credit_amount')->nullable();
            $table->double('credit_limit')->default(0);
            $table->string('profile_pic')->nullable();
            $table->integer('kyc_id')->nullable();
            $table->string('gst_no')->nullable();
            $table->string('pancard')->nullable();
            $table->string('adhaar_card')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_type')->nullable();
            $table->integer('approved_by')->nullable();
            $table->enum('mobile_verified',['Yes','No'])->default('Yes');
            $table->enum('email_verified',['Yes','No'])->default('Yes');
            $table->integer('route')->nullable();
            $table->double('commission')->nullable();
            $table->integer('force_logout')->nullable();
            $table->string('uuid')->nullable();
            $table->date('kyc_date')->nullable();
            $table->string('kyc_modal')->nullable();
            $table->string('multi_api')->default(0);
            $table->float('tds')->default(0);
            $table->float('gst')->default(0);
            $table->integer('is_active')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
