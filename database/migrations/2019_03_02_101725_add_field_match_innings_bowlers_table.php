<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldMatchInningsBowlersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('match_inning_bowlers', function (Blueprint $table) {
            $table->boolean('is_bowling')->after('bowler_id')->default(1);
            $table->integer('maiden')->default(0)->change();
            $table->integer('runs')->default(0)->change();
            $table->integer('wickets')->default(0)->change();
            $table->integer('0s')->default(0)->change();
            $table->integer('4s')->default(0)->change();
            $table->integer('6s')->default(0)->change();
            $table->integer('wides')->default(0)->change();
            $table->integer('no_balls')->default(0)->change();
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
