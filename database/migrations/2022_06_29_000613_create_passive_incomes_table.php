<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassiveIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passive_incomes', function (Blueprint $table) {
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

            $table->string('remove_password_status')->nullable();
            $table->string('crypto')->nullable();
            $table->double('crypto_exchange_cost')->nullable();
            $table->date('crypto_acquire_date')->nullable();
            $table->date('crypto_sold_date')->nullable();
            $table->double('crypto_proceeds')->nullable();
            $table->date('crypto_transaction_date')->nullable();
            $table->double('crypto_value')->nullable();
            $table->double('crypto_income_value')->nullable();
            $table->double('crypto_expenses')->nullable();
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
        Schema::dropIfExists('passive_incomes');
    }
}
