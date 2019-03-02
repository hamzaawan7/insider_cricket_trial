<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BattingStylesTableSeeder::class);
        $this->call(BowlingStylesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(PlayerRolesTableSeeder::class);
        $this->call(VenuesTableSeeder::class);
        $this->call(MatchStatusesTableSeeder::class);
        $this->call(TournamentsTableSeeder::class);
        $this->call(TeamsTableSeeder::class);
        $this->call(PlayersTableSeeder::class);
        $this->call(MatchesTableSeeder::class);
        $this->call(StandingsTableSeeder::class);
    }
}
