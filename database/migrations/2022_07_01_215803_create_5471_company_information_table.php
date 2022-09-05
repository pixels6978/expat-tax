<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create5471CompanyInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('5471_company_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('5471_foreign_corporations_id')->nullable();
            $table->string('foreign_tax_no')->nullable();
            $table->date('incorporation_date')->nullable();
            $table->string('corporation_name')->nullable();
            $table->string('corporation_address')->nullable();
            $table->string('country_laws')->nullable();
            $table->string('company_bank_name')->nullable();
            $table->string('company_bank_no')->nullable();
            $table->string('fiscal_year')->nullable();
            $table->string('place_of_business')->nullable();
            $table->string('business_activity')->nullable();
            $table->string('branch_in_us')->nullable();
            $table->string('us_branch_name')->nullable();
            $table->string('us_branch_address')->nullable();
            $table->string('us_branch_id_no')->nullable();
            $table->string('filed_ustax_return')->nullable();
            $table->string('income_tax_paid')->nullable();
            $table->string('no_of_shares_issued')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('5471_foreign_corporations_id')
            ->references('id')
            ->on('5471_foreign_corporations')
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
        Schema::dropIfExists('5471_company_information');
    }
}
