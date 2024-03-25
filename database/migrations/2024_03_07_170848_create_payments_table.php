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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('date');
            $table->string('number');
            $table->string('payer_account')->nullable()->default(null);
            $table->string('beneficiary')->nullable()->default(null);
            $table->string('beneficiary_account')->nullable()->default(null);
            $table->string('beneficiary_inn')->nullable()->default(null);
            $table->string('beneficiary_kpp')->nullable()->default(null);
            $table->string('beneficiary_country')->nullable()->default(null);
            $table->string('beneficiary_city')->nullable()->default(null);
            $table->string('beneficiary_street')->nullable()->default(null);
            $table->string('beneficiary_bank_code')->nullable()->default(null);
            $table->string('currency_operation_code')->nullable()->default(null);
            $table->string('currency_agreement')->nullable()->default(null);
            $table->string('budget_organization_code')->nullable()->default(null);
            $table->string('income_code')->nullable()->default(null);
            $table->string('region_code')->nullable()->default(null);
            $table->string('have_bank_intermediary')->nullable()->default(null);
            $table->string('payment_sum');
            $table->string('payment_purpose');
            $table->string('comment')->nullable()->default(null);
            $table->unsignedBigInteger('owner_id');
            $table->foreign('owner_id')->references('id')->on('counterparties')->onDelete('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
