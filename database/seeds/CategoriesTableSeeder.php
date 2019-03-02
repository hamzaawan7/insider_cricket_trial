<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
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
            ['name' => 'International', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Domestic', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'U-19', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ];
        DB::table('categories')->insert($data);
    }
}
