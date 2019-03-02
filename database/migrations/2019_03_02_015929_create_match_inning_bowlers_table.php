<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchInningBowlersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_inning_bowlers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inning_id')->unsigned();
            $table->integer('bowler_id')->unsigned();
            $table->double('overs');
            $table->integer('maiden');
            $table->integer('runs');
            $table->integer('wickets');
            $table->double('economy');
            $table->integer('0s');
            $table->integer('4s');
            $table->integer('6s');
            $table->integer('wides');
            $table->integer('no_balls');
            $table->timestamps();

            $table->foreign('inning_id')
                ->references('id')
                ->on('match_innings')
                ->onDelete('cascade');

            $table->foreign('bowler_id')
                ->references('id')
                ->on('players')
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
        Schema::dropIfExists('match_inning_bowlers');
    }
}
