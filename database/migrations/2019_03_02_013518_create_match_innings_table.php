<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchInningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_innings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('match_id')->unsigned();
            $table->integer('batting_team_id')->unsigned();
            $table->integer('fielding_team_id')->unsigned();
            $table->integer('number')->default(1);
            $table->integer('runs')->default(0);
            $table->integer('wickets')->default(0);
            $table->double('overs')->default(0);
            $table->double('run_rate')->default(0);
            $table->integer('extras')->default(0);
            $table->boolean('is_completed')->default(0);
            $table->timestamps();

            $table->foreign('match_id')
                ->references('id')
                ->on('matches')
                ->onDelete('cascade');

            $table->foreign('batting_team_id')
                ->references('id')
                ->on('teams')
                ->onDelete('cascade');

            $table->foreign('fielding_team_id')
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
        Schema::dropIfExists('match_innings');
    }
}
