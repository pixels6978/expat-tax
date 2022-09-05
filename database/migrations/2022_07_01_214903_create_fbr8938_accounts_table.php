<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFbr8938AccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fbr8938_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('fbr8938s_id')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_address')->nullable();
            $table->string('bank_city')->nullable();
            $table->string('bank_zip')->nullable();
            $table->string('bank_country')->nullable();
            $table->string('account_no')->nullable();
            $table->string('account_type')->nullable();
            $table->string('is_it_new_account')->nullable();
            $table->string('is_account_closed')->nullable();
            $table->string('account_currency')->nullable();
            $table->double('highest_balance')->nullable();
            $table->double('balance_on_31dec')->nullable();
            $table->string('primary_account_holder')->nullable();
            $table->string('ownership_type')->nullable();
            $table->integer('no_of_acc_holders')->nullable();
            $table->string('additional_acc_holder_name')->nullable();
            $table->string('additional_country')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('fbr8938s_id')
            ->references('id')
            ->on('fbr8938s')
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
        Schema::dropIfExists('fbr8938_accounts');
    }
}
