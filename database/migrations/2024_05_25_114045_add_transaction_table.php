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
        Schema::table ('transactions', function (Blueprint $table) {

            $table->string('name')->nullable()->after('id');
            $table->unsignedInteger('phone_number')->nullable()->after('name');
            $table->string('address')->nullable()->after('phone_number');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
