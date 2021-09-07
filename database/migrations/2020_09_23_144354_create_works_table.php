<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->text('enterprise')->nullable();
            $table->text('responsible_team')->nullable();
            $table->string('refwork_id')->nullable();
            $table->float('normal_hour')->nullable();
            $table->float('extra_hour')->nullable();
            $table->string('frequency')->nullable();
            $table->string('highway')->nullable();
            $table->string('route')->nullable();
            $table->string('direction')->nullable();
            $table->float('start')->nullable();
            $table->float('end')->nullable();
            $table->string('origin')->nullable();
            $table->string('amount_of_work')->nullable();
            $table->text('observation')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('works');
    }
}
