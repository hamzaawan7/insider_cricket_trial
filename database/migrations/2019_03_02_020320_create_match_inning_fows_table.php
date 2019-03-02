<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchInningFowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_inning_fows', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inning_id')->unsigned();
            $table->integer('bowled_by_id')->unsigned()->nullable();
            $table->integer('number');
            $table->integer('runs');
            $table->double('overs');
            $table->timestamps();

            $table->foreign('inning_id')
                ->references('id')
                ->on('match_innings')
                ->onDelete('cascade');

            $table->foreign('bowled_by_id')
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
        Schema::dropIfExists('match_inning_fows');
    }
}
