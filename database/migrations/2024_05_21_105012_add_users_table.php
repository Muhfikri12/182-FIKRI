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
        Schema::table('users', function (Blueprint $table){

            $table->string('address')->nullable()->after('name');
            $table->unsignedInteger('phone_number')->nullable()->after('address');
            $table->string('birthplace')->after('email')->nullable();
            $table->date('date_of_birth')->after('birthplace')->nullable();
            $table->enum('gender' , ['L', 'P'])->after('date_of_birth')->nullable();
            $table->string('department')->after('gender')->nullable();
            $table->date('starting_date')->after('department')->nullable();
            $table->string('working_period')->after('starting_date')->nullable();
            $table->unsignedInteger('roles_id')->nullable();


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
