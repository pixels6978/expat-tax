<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmendedReturnsFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amended_returns_files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('filings_id')->nullable();
            $table->foreign('filings_id')->references('id')->on('filings')->onDelete('cascade');
            $table->string('file')->nullable();
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
        Schema::dropIfExists('amended_returns_files');
    }
}
