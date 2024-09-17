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
            $table->id('payment_id');
            $table->unsignedBigInteger('enrollment_id');
            $table->decimal('amount', 8, 2);
            $table->string('payment_method');
            $table->enum('payment_status', ['completed', 'pending', 'refunded']);
            $table->string('transaction_id');
            $table->timestamps();

            $table->foreign('enrollment_id')->references('enrollment_id')->on('enrollments')->onDelete('cascade');
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
