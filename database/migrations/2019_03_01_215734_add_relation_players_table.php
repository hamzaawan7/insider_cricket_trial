<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationPlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('players', function (Blueprint $table) {
            $table->foreign('playing_role_id')
                ->references('id')
                ->on('player_roles')
                ->onDelete('cascade');

            $table->foreign('batting_style_id')
                ->references('id')
                ->on('batting_styles')
                ->onDelete('cascade');

            $table->foreign('bowling_style_id')
                ->references('id')
                ->on('bowling_styles')
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
        //
    }
}
