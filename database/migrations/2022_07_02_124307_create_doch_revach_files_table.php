<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDochRevachFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doch_revach_files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('filing_years_id')->nullable();
            $table->unsignedBigInteger('buisness_incomes_id')->nullable();
            $table->string('filename')->nullable();
            $table->string('path')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('buisness_incomes_id')
                ->references('id')
                ->on('buisness_incomes')
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
        Schema::dropIfExists('doch_revach_files');
    }
}
