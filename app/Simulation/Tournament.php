<?php


namespace App\Simulation;


use App\Interfaces\TournamentInterface;

class Tournament implements TournamentInterface
{

    public function build(): \App\Tournament
    {
        // TODO: Implement build() method.
        $tournament = new Tournament();
    }
}
