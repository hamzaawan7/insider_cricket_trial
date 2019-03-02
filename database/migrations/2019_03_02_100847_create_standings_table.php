<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStandingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('standings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id')->unsigned();
            $table->integer('rank');
            $table->integer('matches_played')->default(0);
            $table->integer('won')->default(0);
            $table->integer('lost')->default(0);
            $table->integer('points')->default(0);
            $table->timestamps();

            $table->foreign('team_id')
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
        Schema::dropIfExists('standings');
    }
}
