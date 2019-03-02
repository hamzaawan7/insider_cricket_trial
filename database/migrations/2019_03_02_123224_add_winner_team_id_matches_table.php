<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWinnerTeamIdMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('matches', function (Blueprint $table) {
            $table->integer('winner_team_id')->unsigned()->nullable()->after('toss_winner_team_id');

            $table->foreign('winner_team_id')
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
        //
    }
}
