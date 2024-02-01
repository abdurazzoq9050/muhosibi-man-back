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
        Schema::create('counterparties', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('short_name');
            $table->string('legal_address');
            $table->string('physic_address');
            $table->string('site');
            $table->enum('group',['a','b','c']);
            $table->integer('inn')->length(15);
            $table->integer('kpp')->length(20);
            $table->json('contacts');
            $table->json('for_sign_docs');
            $table->json('by_person');
            $table->json('passport_details');
            $table->json('comment');
            $table->enum('payment_method', ['Наличными','На карту зарплатного проекта',' На личную карту']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counterparties');
    }
};
