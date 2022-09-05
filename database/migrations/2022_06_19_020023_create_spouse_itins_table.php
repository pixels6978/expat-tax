<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpouseItinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('spouse_itins');

        Schema::create('spouse_itins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('itin')->nullable();
            $table->string('itin_number')->nullable();
            $table->string('apply_itin')->nullable();
            $table->string('passport')->nullable();
            $table->string('driver_license')->nullable();
            $table->string('birth_cert')->nullable();
            $table->string('foreign_id')->nullable();
            $table->string('non_resident_tax')->nullable();
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
        Schema::dropIfExists('spouse_itins');
    }
}
