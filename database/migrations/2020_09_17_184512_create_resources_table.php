<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('work_id')->unsigned();
            $table->bigInteger('user_id');
            $table->string('type');
            $table->bigInteger('refresource_id')->unsigned();
            $table->string('unit')->nullable();
            $table->float('quantity');
            $table->text('observation')->nullable();

            $table->string('is_active');

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
        Schema::dropIfExists('resources');
    }
}
