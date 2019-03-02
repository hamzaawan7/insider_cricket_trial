<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class StandingsTableSeeder extends Seeder
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
            ['team_id' => '1', 'rank' => '1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['team_id' => '2', 'rank' => '2', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['team_id' => '3', 'rank' => '3', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['team_id' => '4', 'rank' => '4', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['team_id' => '5', 'rank' => '5', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['team_id' => '6', 'rank' => '6', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['team_id' => '7', 'rank' => '7', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['team_id' => '8', 'rank' => '8', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ];

        DB::table('standings')->insert($data);
    }
}
