<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxDeductionsStudentLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tax_deductions_student_loans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tax_deductions_id')->nullable();
            $table->foreign('tax_deductions_id')->references('id')->on('tax_deductions')->onDelete('cascade');
            $table->string('filename')->nullable();
            $table->string('file_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tax_deductions_student_loans');
    }
}
