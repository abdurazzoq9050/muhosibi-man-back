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
            $table->date('birthday');
            $table->enum('gender', ['Мужской','Женский']);
            $table->string('citizenship');
            $table->string('contract_type');
            $table->string('position');
            $table->date('begin_date');
            $table->date('experience_days');
            $table->integer("unique_number")->unique();
            $table->json('passport_details');
            $table->string('legal_address');
            $table->string('physic_address');
            $table->integer('inn')->length(15);
            $table->enum('payment_method', ['Наличными','На карту зарплатного проекта','На личную карту']);
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
