<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldMatchInningsBatsmenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('match_inning_batsmen', function (Blueprint $table) {
            $table->boolean('is_batting')->after('batsman_id')->default(1);
            $table->boolean('is_on_strike')->after('batsman_id')->default(1);
            $table->integer('runs')->default(0)->change();
            $table->integer('balls')->default(0)->change();
            $table->integer('4s')->default(0)->change();
            $table->integer('6s')->default(0)->change();
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
