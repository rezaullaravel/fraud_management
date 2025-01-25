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
        Schema::create('fraud_masters', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->integer('user_id')->nullable(); // Primary key
            $table->string('fraudster_name')->nullable(); // Fraudster's name or business name
            $table->string('location')->nullable(); // Location
            $table->string('fraud_type')->nullable(); // Type of fraud
            $table->string('bank_details')->nullable(); // Fraudster's bank details (optional)
            $table->string('payment_platform')->nullable(); // Payment platform used (optional)
            $table->decimal('fraud_amount', 10, 2)->nullable(); // Fraud amount (optional)
            $table->dateTime('fraud_date_time')->nullable(); // Date and time of fraud
            $table->text('description')->nullable(); // Summary of the incident
            $table->string('reporter_name')->nullable(); // Reporter's name
            $table->string('privacy_consent_name')->default('0'); // Consent to reveal name
            $table->string('privacy_consent_email')->default('0'); // Consent to reveal name
            $table->string('contact_info')->nullable(); // Email, phone, or profile link
            $table->string('scammer_url')->nullable(); // Scammer's profile URL (optional)
            $table->string('report_status')->default('0'); // Report status
            $table->timestamps(); // Created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fraud_masters');
    }
};
