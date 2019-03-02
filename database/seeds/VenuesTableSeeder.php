<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class VenuesTableSeeder extends Seeder
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
            ['name' => 'Mohali Cricket Ground', 'country_id' => '103', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Delhi Cricket Ground', 'country_id' => '103', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Maharashtra Cricket Ground', 'country_id' => '103', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Wankhede Stadium', 'country_id' => '103', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Eden Gardens', 'country_id' => '103', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Himachel Pradesh Stadium', 'country_id' => '103', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Jawarharlal Nehru Stadium', 'country_id' => '103', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ];
        DB::table('venues')->insert($data);
    }
}
