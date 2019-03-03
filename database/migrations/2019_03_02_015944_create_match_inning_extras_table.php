<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchInningExtrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_inning_extras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inning_id')->unsigned();
            $table->integer('wides');
            $table->integer('no_balls');
            $table->integer('total');
            $table->timestamps();

            $table->foreign('inning_id')
                ->references('id')
                ->on('match_innings')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('match_inning_extras');
    }
}
