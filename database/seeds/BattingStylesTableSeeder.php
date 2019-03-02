<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BattingStylesTableSeeder extends Seeder
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
            ['name' => 'Right', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Left', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ];
        DB::table('batting_styles')->insert($data);
    }
}
