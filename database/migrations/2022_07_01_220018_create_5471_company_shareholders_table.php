<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create5471CompanyShareholdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('5471_company_shareholders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('5471_company_information_id')->nullable();
            $table->string('name')->nullable();
            $table->string('ssn')->nullable();
            $table->string('address')->nullable();
            $table->string('ownership_type')->nullable();
            $table->string('ownership_percentage')->nullable();
            $table->timestamps();



            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('5471_company_information_id')
            ->references('id')
            ->on('5471_company_information')
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
        Schema::dropIfExists('5471_company_shareholders');
    }
}
