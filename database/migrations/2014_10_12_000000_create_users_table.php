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
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('access')->default('user');
            $table->string('status')->default('Active');
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('phone')->nullable();
            $table->string('rating')->default(0);
            $table->string('photo')->nullable();
            $table->string('staffcode')->nullable();
            $table->string('sal_id')->nullable();
            $table->string('staffstatus')->nullable();
            $table->timestamp('saladdtime')->nullable();
            $table->string('flipphoto1')->nullable();
            $table->string('flipphoto2')->nullable();
            $table->string('flipphoto3')->nullable();
            $table->string('flipphoto4')->nullable();
            $table->string('flipphoto5')->nullable();
            $table->string('role')->nullable();
            $table->string('dayoff')->default('working');

            $table->rememberToken();
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
