<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
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
                'tournament_id' => '1',
                'logo' => 'https://a.espncdn.com/i/teamlogos/cricket/500/335974.png',
                'name' => 'Chennai Super Kings',
                'abbreviation' => 'CSK',
                'team_category_id' => '2',
                'country_id' => '103',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'tournament_id' => '1',
                'logo' => 'https://a.espncdn.com/i/teamlogos/cricket/500/335973.png',
                'name' => 'Kings XI Punjabs',
                'abbreviation' => 'KXP',
                'team_category_id' => '2',
                'country_id' => '103',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'tournament_id' => '1',
                'logo' => 'https://a.espncdn.com/i/teamlogos/cricket/500/335970.png',
                'name' => 'Royal Challengers Banglore',
                'abbreviation' => 'RCB',
                'team_category_id' => '2',
                'country_id' => '103',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'tournament_id' => '1',
                'logo' => 'https://a.espncdn.com/i/teamlogos/cricket/500/335978.png',
                'name' => 'Mumbia Indians',
                'abbreviation' => 'MI',
                'team_category_id' => '2',
                'country_id' => '103',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'tournament_id' => '1',
                'logo' => 'https://a.espncdn.com/i/teamlogos/cricket/500/335977.png',
                'name' => 'Rajasthan Royals',
                'abbreviation' => 'RR',
                'team_category_id' => '2',
                'country_id' => '103',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'tournament_id' => '1',
                'logo' => 'https://a.espncdn.com/i/teamlogos/cricket/500/335971.png',
                'name' => 'Kolkata Knight Riders',
                'abbreviation' => 'KKR',
                'team_category_id' => '2',
                'country_id' => '103',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'tournament_id' => '1',
                'logo' => 'https://a.espncdn.com/i/teamlogos/cricket/500/335975.png',
                'name' => 'Delhi Kings',
                'abbreviation' => 'DK',
                'team_category_id' => '2',
                'country_id' => '103',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'tournament_id' => '1',
                'logo' => 'https://a.espncdn.com/i/teamlogos/cricket/500/628333.png',
                'name' => 'Sunrisers Hyderabad',
                'abbreviation' => 'SH',
                'team_category_id' => '2',
                'country_id' => '103',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];
        DB::table('teams')->insert($data);
    }
}
