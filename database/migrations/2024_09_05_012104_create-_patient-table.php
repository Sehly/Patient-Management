<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
        
    public function up(): void
    {
        Schema::create('patient', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('Name',255);
            $table->date('Date');
            $table->bigInteger('Phone')->unique();
            $table->enum('Payment',['Cash','Insurance']);
            $table->string('Recommended',255)->default('not recommended');
            $table->integer('Total_Session');
            $table->integer('Session_Number');
            $table->integer('Total_Amount');
            $table->integer('Discount')->nullable();
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
