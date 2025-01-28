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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->string('invoice_number');
            $table->date('invoice_date');
            $table->string('payment_method')->default('Bank Transfer')->nullable();
            $table->string('status')->default('Draft');
            $table->decimal('sub_total', 9, 2);
            $table->decimal('discount', 9, 2)->default(0);
            $table->decimal('total', 9, 2);
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
