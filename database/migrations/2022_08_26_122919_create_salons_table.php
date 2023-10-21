<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salons', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('name')->nullable();
            $table->string('motto')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->text('location')->nullable();
            $table->string('photo')->nullable();
            $table->string('work_d')->nullable();
            $table->string('work_sh')->nullable();
            $table->string('work_fh')->nullable();
            $table->string('rating')->default(0);
            $table->string('status')->default('Active');
            $table->string('open')->default('true');
            $table->string('service')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('flipphoto1')->nullable();
            $table->string('flipphoto2')->nullable();
            $table->string('flipphoto3')->nullable();
            $table->string('flipphoto4')->nullable();
            $table->string('flipphoto5')->nullable();

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
        Schema::dropIfExists('salons');
    }
}
