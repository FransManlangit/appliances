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
        Schema::create('orderinfo', function (Blueprint $table) {
               $table->increments('orderinfo_id');
                $table->integer('customer_id')->unsigned();
                $table->foreign('customer_id')->references('customer_id')->on('customers');
                $table->text('status');
                $table->timestamps();
            });
    
            Schema::create('orderline', function (Blueprint $table) {
                $table->integer('orderinfo_id')->unsigned();
                $table->foreign('orderinfo_id')->references('orderinfo_id')->on('orderinfo');
                $table->integer('repair_id')->unsigned();
                $table->foreign('repair_id')->references('repair_id')->on('repairs');
            });
     
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('orderinfo_orderline');
        Schema::dropIfExists('orderinfo');
        Schema::dropIfExists('orderline');
    }
};
