<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('barber_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('username')->nullable();
            $table->string('title')->nullable();
            $table->string('status')->nullable();
            $table->text('service')->nullable();
            $table->string('start')->nullable();
            $table->string('end')->nullable();
            $table->string('barber')->nullable();
            $table->string('salon')->nullable();
            $table->string('startdate')->nullable();
            $table->string('starthour')->nullable();
            $table->string('comment')->nullable();
            $table->string('finished')->default('falce');
            $table->bigInteger('start_ms')->nullable();
            $table->bigInteger('dur_ms')->nullable();
            $table->bigInteger('end_ms')->nullable();

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
        Schema::dropIfExists('events');
    }
}
