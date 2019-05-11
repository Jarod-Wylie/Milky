<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('systems', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->bigInteger('XCoordinate');
            $table->bigInteger('YCoordinate');
            $table->string('Satelites')->nullable;
            $table->timestamps();
        });

    //     Schema::table('systems',function (Blueprint $table) {
    //         $table->foreign('planets_id')->references('name')->on('planets');
    // });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('systems');
    }
}
