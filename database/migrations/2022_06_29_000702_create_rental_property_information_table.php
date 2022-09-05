<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalPropertyInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_property_information', function (Blueprint $table) {
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

            $table->date('purchase_date')->nullable();
            $table->double('purchase_price')->nullable();
            $table->date('rental_start_date')->nullable();
            $table->string('land_included_in_price')->nullable();
            $table->string('property_owner')->nullable();
            $table->string('percentage_ownership')->nullable();
            $table->string('property_address')->nullable();
            $table->string('property_type')->nullable();
            $table->string('tenant_relationship')->nullable();
            $table->integer('rental_days')->nullable();
            $table->integer('personal_used_days')->nullable();
            $table->string('property_manager')->nullable();
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
        Schema::dropIfExists('rental_property_information');
    }
}
