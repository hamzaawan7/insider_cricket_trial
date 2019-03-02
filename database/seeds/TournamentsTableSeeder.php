<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TournamentsTableSeeder extends Seeder
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
                'logo' => 'https://diylogodesigns.com/wp-content/uploads/2018/04/VIVO-IPL-Logo-png.png',
                'name' => 'Indian Premier League',
                'abbreviation' => 'IPL',
                'tournament_category_id' => '2',
                'country_id' => '103',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];
        DB::table('tournaments')->insert($data);
    }
}
