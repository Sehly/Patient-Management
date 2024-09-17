<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 10, 2); // Amount with 10 digits in total and 2 decimal places
            $table->string('payment_method'); // Payment method as a string
            $table->decimal('discount', 5, 2)->nullable(); // Discount with 5 digits in total and 2 decimal places
            $table->date('payment_date')->nullable(); // Payment date as a date
            $table->foreignId('patient_id')->constrained()->onDelete('cascade'); // Foreign key for patients table
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
