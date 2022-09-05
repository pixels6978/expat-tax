<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('users');

        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('userid')->nullable();
            $table->string('name')->nullable();
            $table->string('country')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->integer('role_id')->nullable();
            $table->tinyInteger('userstatus')->nullable()->default(0);
            $table->tinyInteger('passwordactive')->nullable()->default(0);
            $table->date('password_expiration')->nullable();
            $table->tinyInteger('softdelete')->nullable()->default(0);
            $table->tinyInteger('loginstatus')->nullable()->default(0);
            // $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('users');
    }
}
