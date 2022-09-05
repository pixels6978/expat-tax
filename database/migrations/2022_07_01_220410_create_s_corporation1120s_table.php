<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSCorporation1120sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_corporation1120s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('filing_years_id')->nullable();
            $table->string('is_first_time')->nullable();
            $table->string('last_filed_form')->nullable();
            $table->string('corporation_name')->nullable();
            $table->string('corporation_address')->nullable();
            $table->string('ein')->nullable();
            $table->string('product_provided')->nullable();
            $table->string('principal_business')->nullable();
            $table->string('corporation_date')->nullable();
            $table->string('shareholder_name')->nullable();
            $table->string('shareholder_address')->nullable();
            $table->string('shareholder_percentage')->nullable();
            $table->string('ustax_no')->nullable();
            $table->string('is_employ_worker')->nullable();
            $table->string('independent_contractors_payments')->nullable();
            $table->string('file_1099MISC')->nullable();
            $table->string('foreign_sharholders_transactions')->nullable();
            $table->string('end_of_year_balance')->nullable();
            $table->string('are_assets_worth_one_million')->nullable();
            $table->string('balance_sheet')->nullable();
            $table->string('profit_loss_statement')->nullable();
            $table->string('profit_loss_statement_file')->nullable();

            $table->string('income_currency')->nullable();
            $table->double('gross_income')->nullable();
            $table->string('has_expenses')->nullable();
            $table->double('advertising')->nullable();
            $table->double('vehicle')->nullable();
            $table->double('commissions')->nullable();
            $table->double('contract_labor')->nullable();
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

            $table->string('cost_of_goods_sold')->nullable();
            $table->string('closing_inventory_method')->nullable();
            $table->string('open_close_inventory_challenge')->nullable();
            $table->string('beginning_inventory_amount')->nullable();
            $table->string('amount_spent_on_purchases')->nullable();
            $table->string('cost_of_items_for_personal_use')->nullable();
            $table->string('labor_cost')->nullable();
            $table->string('material_cost')->nullable();
            $table->string('other_costs')->nullable();
            $table->string('year_end_inventory_amount')->nullable();
            $table->timestamps();


            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('filing_years_id')
            ->references('id')
            ->on('filing_years')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_corporation1120s');
    }
}
