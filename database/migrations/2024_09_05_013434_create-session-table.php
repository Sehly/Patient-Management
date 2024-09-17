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
        Schema::create('session', function (Blueprint $table) {
            $table->id()->unique();
            $table->date('Date');
            $table->integer('Patient_id')->unique();
            $table->integer('Session_Number');
            $table->integer('Session_Amount');
            $table->timestamps();
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
