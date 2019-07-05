<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RoundsTableSeeder extends Seeder
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
                'tournament_id' => 1,
                'number' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];
        DB::table('rounds')->insert($data);
    }
}
