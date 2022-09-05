<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuisnessIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buisness_incomes', function (Blueprint $table) {
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

            $table->string('country')->nullable();
            $table->string('is_self_employed_israel')->nullable();
            $table->string('is_self_employed')->nullable();
            $table->string('business_names')->nullable();
            $table->string('is_name_business_name')->nullable();
            $table->string('business_address')->nullable();
            $table->string('principle_activity')->nullable();
            $table->string('who_operates')->nullable();
            $table->date('business_start_date')->nullable();
            $table->string('employ_worker')->nullable();
            $table->string('is_file_forms1099')->nullable();
            $table->string('is_other_self_employed')->nullable();
            $table->string('nec1099_file')->nullable();
            $table->string('is_income_from_nec1099')->nullable();
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
        Schema::dropIfExists('buisness_incomes');
    }
}
