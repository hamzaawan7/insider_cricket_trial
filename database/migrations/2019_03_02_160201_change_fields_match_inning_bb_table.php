<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeFieldsMatchInningBbTable extends Migration
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
            $table->renameColumn('4s', 'fours')->change();
            $table->renameColumn('6s', 'sixes')->change();
        });

        Schema::table('match_inning_bowlers', function (Blueprint $table) {
            $table->renameColumn('0s', 'zeros')->change();
            $table->renameColumn('4s', 'fours')->change();
            $table->renameColumn('6s', 'sixes')->change();
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
