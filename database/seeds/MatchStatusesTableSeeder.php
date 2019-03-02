<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MatchStatusesTableSeeder extends Seeder
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
            ['name' => 'Scheduled', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Live', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Completed', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ];
        DB::table('match_statuses')->insert($data);
    }
}
