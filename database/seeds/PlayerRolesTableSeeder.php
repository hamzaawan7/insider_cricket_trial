<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PlayerRolesTableSeeder extends Seeder
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
            ['name' => 'CAP', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'CAP/WKT', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'WKT/BAT', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'WKT', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'BAT', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'BWL', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'ALL', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ];
        DB::table('player_roles')->insert($data);
    }
}
