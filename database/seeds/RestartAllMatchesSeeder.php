<?php

use Illuminate\Database\Seeder;

class RestartAllMatchesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        App\MatchInning::truncate();
        App\MatchInningBatsman::truncate();
        App\MatchInningBowler::truncate();
        App\MatchInningPartnership::truncate();
        App\MatchInningFow::truncate();
        App\MatchInningExtra::truncate();
        App\Standing::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        DB::table('matches')->update([
            'match_status_id' => 1,
            'current_innings_id' => null
        ]);
    }
}
