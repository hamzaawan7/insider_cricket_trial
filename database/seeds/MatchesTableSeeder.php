<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MatchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'title' => 'CSK vs SH',
                'tournament_id' => 1,
                'round_id' => 1,
                'team1_id' => 1,
                'team2_id' => 8,
                'venue_id' => 1,
                'toss_winner_team_id' => 1,
                'datetime_start' => date('Y-m-d H:i'),
                'match_status_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'MI vs KXP',
                'tournament_id' => 1,
                'round_id' => 1,
                'team1_id' => 4,
                'team2_id' => 2,
                'venue_id' => 2,
                'toss_winner_team_id' => 4,
                'datetime_start' => date('Y-m-d H:i'),
                'match_status_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'RR vs KKR',
                'tournament_id' => 1,
                'round_id' => 1,
                'team1_id' => 5,
                'team2_id' => 6,
                'venue_id' => 4,
                'toss_winner_team_id' => 5,
                'datetime_start' => date('Y-m-d H:i'),
                'match_status_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'DK vs RCB',
                'tournament_id' => 1,
                'round_id' => 1,
                'team1_id' => 7,
                'team2_id' => 3,
                'venue_id' => 3,
                'toss_winner_team_id' => 7,
                'datetime_start' => date('Y-m-d H:i'),
                'match_status_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];
        DB::table('matches')->insert($data);
    }
}
