<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomeExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('income_expenses', function (Blueprint $table) {
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

            $table->date('tax_year')->nullable();
            $table->double('amount_of_gross')->nullable();
            $table->string('has_expenses')->nullable();
            $table->double('advertising')->nullable();
            $table->double('vehicle')->nullable();
            $table->double('commissions')->nullable();
            $table->double('goods_sold')->nullable();
            $table->double('depletion')->nullable();
            $table->double('employee_benefits')->nullable();
            $table->double('employee_benefits_program')->nullable();
            $table->double('insurance')->nullable();
            $table->double('self_employed_health_insurance')->nullable();
            $table->double('mortgage_interest')->nullable();
            $table->double('other_interest')->nullable();
            $table->double('legal_services')->nullable();
            $table->double('office_expenses')->nullable();
            $table->double('pension')->nullable();
            $table->double('vehicle_rental')->nullable();
            $table->double('machinery_rental')->nullable();
            $table->double('other_items_rental')->nullable();
            $table->double('repairs')->nullable();
            $table->double('supplies')->nullable();
            $table->double('taxes')->nullable();
            $table->double('travel')->nullable();
            $table->double('meal')->nullable();
            $table->double('utilities')->nullable();
            $table->double('wages_expense')->nullable();
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
        Schema::dropIfExists('income_expenses');
    }
}
