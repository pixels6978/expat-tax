<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpouseForeignEarnedIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spouse_foreign_earned_incomes', function (Blueprint $table) {
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

            $table->string('employer_name')->nullable();
            $table->string('employer_address')->nullable();
            $table->string('national')->nullable();
            $table->string('separate_family_residence')->nullable();
            $table->string('family_country')->nullable();
            $table->string('family_city')->nullable();
            $table->string('family_residence_days')->nullable();
            $table->string('country_resided')->nullable();
            $table->date('residence_start_date')->nullable();
            $table->date('residence_end_date')->nullable();
            $table->string('type_of_living_quarters')->nullable();
            $table->string('did_family_live_with_you_abroad')->nullable();
            $table->string('relative_name')->nullable();
            $table->string('relative_reside_period')->nullable();
            $table->string('stmt_to_foreign_country_authorities')->nullable();
            $table->string('pay_tax_to_foreign_country')->nullable();
            $table->string('present_in_us')->nullable();
            $table->date('us_arrival_date')->nullable();
            $table->date('us_date_left')->nullable();
            $table->integer('us_business_days')->nullable();
            $table->double('us_income')->nullable();
            $table->string('contractual_terms')->nullable();
            $table->string('visa_type')->nullable();
            $table->string('visa_limit_stay_lenght')->nullable();
            $table->string('limit_way')->nullable();
            $table->string('maintain_us_home')->nullable();
            $table->string('us_home_address')->nullable();
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
        Schema::dropIfExists('spouse_foreign_earned_incomes');
    }
}
