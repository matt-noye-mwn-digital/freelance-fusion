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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('project_type_id');
            $table->unsignedBigInteger('client_id');
            $table->date('start_date')->nullable();
            $table->date('due_date');
            $table->decimal('progress', 6, 1)->nullable();
            $table->string('billing_type')->default('fixed_rate');
            $table->decimal('fixed_rate_price', 16, 2)->nullable();
            $table->decimal('hourly_rate_price', 16, 2)->nullable();
            $table->decimal('project_total', 16, 2)->nullable();
            $table->decimal('estimated_hours', 5, 2)->default(0)->nullable();
            $table->text('description')->nullable();

            $table->timestamps();

            $table->foreign('project_type_id')->references('id')->on('project_types')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
