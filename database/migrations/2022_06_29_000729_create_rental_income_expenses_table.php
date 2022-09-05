<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalIncomeExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_income_expenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->unsignedBigInteger('filing_years_id')->nullable();
            $table->foreign('filing_years_id')
            ->references('id')
            ->on('filing_years')
            ->onDelete('cascade');

            $table->integer('tax_year,')->nullable();
            $table->double('gross_rental_income,')->nullable();
            $table->string('currency,')->nullable();
            $table->double('advertising,')->nullable();
            $table->double('auto,')->nullable();
            $table->double('travel,')->nullable();
            $table->double('cleaning,')->nullable();
            $table->double('commissions,')->nullable();
            $table->double('mortgage_insurance,')->nullable();
            $table->double('other_insurance,')->nullable();
            $table->double('legal_fees,')->nullable();
            $table->double('mortgage_interest,')->nullable();
            $table->double('other_mortgage_interest,')->nullable();
            $table->double('other_interest,')->nullable();
            $table->double('repairs,')->nullable();
            $table->double('supplies,')->nullable();
            $table->double('real_estate_taxes,')->nullable();
            $table->double('other_taxes,')->nullable();
            $table->double('utilities,')->nullable();
            $table->double('vehicle_rental,')->nullable();
            $table->double('other_expenses')->nullable();
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
        Schema::dropIfExists('rental_income_expenses');
    }
}
