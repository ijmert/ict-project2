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
        Schema::create('sensor_last_measurements', function (Blueprint $table) {
            $table->integer('LastMeasurement');
            $table->string('topic');
            $table->foreign('topic')->references('topic')->on('sensors');
            $table->timestamps();
            $table->primary('topic');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sensor_last_measurements');
    }
};
