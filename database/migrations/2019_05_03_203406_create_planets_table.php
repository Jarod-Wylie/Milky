<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->bigInteger('XCoordinate');
            $table->bigInteger('YCoordinate');
            $table->unsignedBigInteger('systems_id')->nullable();
            $table->timestamps();

            $table->foreign('systems_id')->references('id')->on('systems');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planets');
    }
}
