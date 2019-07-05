<?php


namespace App\Interfaces;


use App\Tournament;

interface TournamentInterface
{
    public function build() : Tournament;
}
