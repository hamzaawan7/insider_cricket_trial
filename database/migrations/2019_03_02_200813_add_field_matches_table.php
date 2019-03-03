<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('matches', function (Blueprint $table) {
            $table->integer('current_innings_id')->unsigned()->nullable()->after('match_status_id');

            $table->foreign('current_innings_id')
                ->references('id')
                ->on('match_innings');
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
