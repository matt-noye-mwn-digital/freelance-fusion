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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->decimal('amount');
            $table->date('expense_date');
            $table->integer('tax_amount_one')->nullable();
            $table->integer('tax_amount_two')->nullable();
            $table->string('ref_no')->nullable();
            $table->text('note')->nullable();
            $table->string('receipt')->nullable();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->boolean('invoiced')->default(0);
            $table->unsignedBigInteger('payment_method_id')->nullable();

            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('expense_categories');
            $table->foreign('currency_id')->references('id')->on('currencies');
            $table->foreign('client_id')->references('id')->on('users');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
