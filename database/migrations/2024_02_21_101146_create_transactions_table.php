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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            // $table->enum('base', ['Переход','Поступление']);
            $table->enum('type', ['Переход','Поступление']);
            $table->json('details');
            $table->decimal('total',50,2);
            $table->decimal('total_tax',50,2);

            $table->unsignedBigInteger('sender');
            $table->foreign('sender')->references('id')->on('counterparties')->onDelete('cascade');
            
            
            $table->unsignedBigInteger('taker');
            $table->foreign('taker')->references('id')->on('counterparties')->onDelete('cascade');

            
            $table->unsignedBigInteger('payment');
            $table->foreign('payment')->references('id')->on('payment_accounts')->onDelete('cascade');

            $table->enum('status', ['В обработке','Принят','Ошибка','Удержан']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
