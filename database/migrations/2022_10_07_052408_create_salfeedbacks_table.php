<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalfeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salfeedbacks', function (Blueprint $table) {
            $table->id();

            $table->string('sal_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('username')->nullable();
            $table->string('title')->nullable();
            $table->string('feedback')->nullable();
            $table->string('star')->nullable();
            $table->string('status')->default('Active');

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
        Schema::dropIfExists('salfeedbacks');
    }
}
