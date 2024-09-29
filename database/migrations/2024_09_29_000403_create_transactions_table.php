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
            $table->date('transaction_date');
            $table->unsignedBigInteger('client_id')->nullable();
            $table->text('description')->nullable();
            $table->string('transaction_id')->nullable();
            $table->unsignedBigInteger('payment_method_id')->nullable();
            $table->decimal('amount_in')->nullable();
            $table->decimal('fees')->nullable();
            $table->decimal('amount_out')->nullable();
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->boolean('add_to_clients_balance')->default(0);
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('users');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods');
            $table->foreign('currency_id')->references('id')->on('currencies');

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
