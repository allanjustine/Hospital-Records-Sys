<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_id');
            $table->string('name');
            $table->string('gender');
            $table->string('date_of_birth');
            $table->string('date_in');
            $table->string('date_out')->default('Not yet discharged');
            $table->string('address');
            $table->string('phone');
            $table->string('reasons');
            $table->timestamps();

            $table->foreign('room_id')->references('id')->on('rooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
};
