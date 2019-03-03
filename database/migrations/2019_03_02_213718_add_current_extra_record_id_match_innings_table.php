<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCurrentExtraRecordIdMatchInningsTable extends Migration
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
            $table->integer('current_extra_record_id')->unsigned()->nullable()->after('current_bowling_bowler_id');

            $table->foreign('current_extra_record_id')
                ->references('id')
                ->on('match_inning_extras');
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
