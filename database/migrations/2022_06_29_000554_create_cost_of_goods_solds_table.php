<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCostOfGoodsSoldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cost_of_goods_solds', function (Blueprint $table) {
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

            $table->string('do_you_have')->nullable();
            $table->string('inventory_value_method')->nullable();
            $table->string('any_changes')->nullable();
            $table->double('beginning_inventory')->nullable();
            $table->double('purchases_amount')->nullable();
            $table->double('cost_of_withdrawn_items')->nullable();
            $table->double('labor_cost')->nullable();
            $table->double('materials_cost')->nullable();
            $table->double('other_cost')->nullable();
            $table->double('end_inventory_amount')->nullable();
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
        Schema::dropIfExists('cost_of_goods_solds');
    }
}
