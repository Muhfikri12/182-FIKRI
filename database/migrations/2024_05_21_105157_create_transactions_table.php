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
            $table->unsignedBigInteger('id_cashier')->nullable();
            $table->unsignedBigInteger('id_customer')->nullable();
            $table->enum('services', ['express', 'one day', 'regular'])->nullable();
            $table->unsignedInteger('price')->nullable();
            $table->unsignedInteger('quantity')->nullable();
            $table->unsignedInteger('total')->nullable();
            $table->enum('pay_method',['lunas', 'take and pay'])->nullable();

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
