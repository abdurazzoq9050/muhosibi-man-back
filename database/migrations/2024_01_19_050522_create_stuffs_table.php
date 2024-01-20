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
        Schema::create('stuffs', function (Blueprint $table) {
            $table->id(); 
            $table->string('first_name');
            $table->string('last_name');
            $table->string('father_name');
            $table->string('birthday');
            $table->string('gender');
            $table->string('citizenship');
            $table->string('contract_type');
            $table->string('position');
            $table->string('begin_date');
            $table->string('legal_address');
            $table->string('physic_address');
            $table->string('site');
            $table->string('group');
            $table->string('inn');
            $table->string('kpp');
            $table->string('contacts');
            $table->string('for_sign_docs');
            $table->string('passport_details');
            $table->string('comment');
            $table->string('payment_account');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stuffs');
    }
};
