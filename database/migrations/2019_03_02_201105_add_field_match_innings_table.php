<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldMatchInningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('match_innings', function (Blueprint $table) {
            $table->integer('current_partnership_id')->unsigned()->nullable()->after('is_completed');
            $table->integer('current_bowling_bowler_id')->unsigned()->nullable()->after('is_completed');
            $table->integer('current_onstrike_batsman_id')->unsigned()->nullable()->after('is_completed');

            $table->foreign('current_onstrike_batsman_id')
                ->references('id')
                ->on('match_inning_batsmen');

            $table->foreign('current_bowling_bowler_id')
                ->references('id')
                ->on('match_inning_bowlers');

            $table->foreign('current_partnership_id')
                ->references('id')
                ->on('match_inning_partnerships');
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
