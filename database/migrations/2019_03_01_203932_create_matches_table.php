<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('tournament_id')->unsigned();
            $table->integer('team1_id')->unsigned();
            $table->integer('team2_id')->unsigned();
            $table->integer('venue_id')->unsigned();
            $table->integer('toss_winner_team_id')->unsigned()->nullable();
            $table->dateTime('datetime_start');
            $table->integer('match_status_id')->unsigned();
            $table->timestamps();

            $table->foreign('team1_id')
                ->references('id')
                ->on('teams')
                ->onDelete('cascade');

            $table->foreign('team2_id')
                ->references('id')
                ->on('teams')
                ->onDelete('cascade');

            $table->foreign('toss_winner_team_id')
                ->references('id')
                ->on('teams')
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
        Schema::dropIfExists('matches');
    }
}
