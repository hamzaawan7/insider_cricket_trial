<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeBattingOrderMatchInningBatsmenTable extends Migration
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
            $table->dropColumn('batting_order');
        });
        Schema::table('match_innings', function (Blueprint $table) {
            $table->integer('last_batting_order')->default(0)->after('is_completed');
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
