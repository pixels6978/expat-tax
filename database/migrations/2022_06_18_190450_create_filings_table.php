<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('filings');
        Schema::create('filings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('filing_years_id')->nullable();
            $table->foreign('filing_years_id')->references('id')->on('filing_years')->onDelete('cascade');
            $table->string('additional_returns')->nullable();
            $table->tinyInteger('partnership')->nullable()->default(0);
            $table->tinyInteger('foreign_corporation')->nullable()->default(0);
            $table->tinyInteger('ccorporation')->nullable()->default(0);
            $table->tinyInteger('scorporation')->nullable()->default(0);
            $table->tinyInteger('not_profit')->nullable()->default(0);
            $table->string('amended_returns')->nullable();
            $table->string('returning_clients')->nullable();
            $table->string('ustax_return')->nullable();
            $table->string('ustax_return_file')->nullable();
            $table->string('taxreturn_extension')->nullable();
            $table->date('duedate_return')->nullable();
            $table->string('claimed_dependent')->nullable();
            $table->string('streamlined_filing')->nullable();
            $table->text('non_willful_wording')->nullable();
            $table->date('immigrated_date')->nullable();
            $table->string('living_us')->nullable();
            $table->string('ip_pin')->nullable();
            $table->string('ippin_number')->nullable();
            $table->string('cant_find_ip_pin')->nullable();
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
        Schema::dropIfExists('filings');
    }
}
