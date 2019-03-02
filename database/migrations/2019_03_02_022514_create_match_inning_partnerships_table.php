<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchInningPartnershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_inning_partnerships', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inning_id')->unsigned();
            $table->integer('batsman1_id')->unsigned()->nullable();
            $table->integer('batsman2_id')->unsigned()->nullable();
            $table->integer('runs_contribution');
            $table->integer('balls_faced');
            $table->integer('strike_rate');
            $table->timestamps();

            $table->foreign('inning_id')
                ->references('id')
                ->on('match_innings')
                ->onDelete('cascade');

            $table->foreign('batsman1_id')
                ->references('id')
                ->on('players')
                ->onDelete('cascade');

            $table->foreign('batsman2_id')
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
        Schema::dropIfExists('match_inning_partnerships');
    }
}
