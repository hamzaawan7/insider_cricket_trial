<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldNonStrikeMatchInningsTable extends Migration
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
            $table->integer('current_nonstrike_batsman_id')->unsigned()->nullable()->after('current_onstrike_batsman_id');

            $table->foreign('current_nonstrike_batsman_id')
                ->references('id')
                ->on('match_inning_batsmen');
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
