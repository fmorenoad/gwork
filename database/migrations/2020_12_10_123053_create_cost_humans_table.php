<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCostHumansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cost_humans', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->string('alias')->nullable();
            $table->string('unit_service');
            $table->string('amount_service');
            $table->integer('year');
            $table->integer('month');
            $table->double('cost');
            $table->string('money');
            $table->string('resource_id')->nullable();
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
        Schema::dropIfExists('cost_humans');
    }
}
