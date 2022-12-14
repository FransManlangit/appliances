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
        Schema::create('consultations', function (Blueprint $table) {
            $table->increments('consult_id');
            $table->integer('appliance_id')->unsigned();
            $table->foreign('appliance_id')->references('appliance_id')->on('appliances');
            $table->integer('employee_id')->unsigned();
            $table->foreign('employee_id')->references('employee_id')->on('employees');
            $table->string('defective');
            $table->string('recommendation');
            $table->string('price');
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
        Schema::dropIfExists('consultations');
    }
};
