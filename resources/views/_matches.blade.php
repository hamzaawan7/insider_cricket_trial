<div class="col-md-12">
    @if(count($matches))
        @foreach($matches as $match)
            <div class="rs-item" data-slidertitle="{{ $match->title }}">
                <div class="result-card">
                    <div class="reslt-head clearboth">
                        <img src="{{ $match->team1->logo }}" alt="{{ $match->team1->name }}">
                        <img src="{{ $match->team2->logo }}" alt="{{ $match->team2->name }}">
                        @if($match->match_status_id == 1)
                            <div class="stream ended">
                                <span class="all-caps bg-light-blue taged">{{ $match->matchStatus->name }}</span>
                            </div>
                        @elseif($match->match_status_id == 2)
                            <div class="stream text-dark-red">
                                <span class="all-caps">{{ $match->matchStatus->name }}</span>
                                <span class="stream-icon"></span>
                            </div>
                        @elseif($match->match_status_id == 3)
                            <div class="stream ended">
                                <span class="all-caps bg-light-blue taged">
                                    @if(!empty($match->winnerTeam))
                                        {{ $match->winnerTeam->abbreviation }} WON
                                    @else
                                        Match Completed
                                    @endif
                                </span>
                            </div>
                        @endif
                    </div>
                    <div class="result-content">
                        <span class="result-title d-block">{{ $match->title }}</span>
                        <small>at {{ $match->venue->name }}</small>

                        @if(count($match->matchInnings))
                            <div class="runs">
                                @foreach($match->matchInnings as $inning)
                                    <p>
                                        <span class="result-title all-caps">
                                            {{ $inning->battingTeam->abbreviation }}
                                        </span>
                                        {{ $inning->runs }}/{{ $inning->wickets }}
                                        ({{ $inning->overs }} ov)
                                    </p>
                                @endforeach
                            </div>
                        @endif
                        <a href="#{{--{{ route('match', $match->id) }}--}}" onclick="return false;"
                           class="trans-btn text-blue btn">
                            Match Overview
                            <span class="btn-icon fa fa-chevron-right"></span>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
<div class="col-md-12" style="margin-top: 300px; border-top: 2px solid;">
    <div id="lt-nav" class="poped league-top-nav clearboth"></div>
    <div class="leages-tables lt-2">
        <div class="lt-slider">
            @if(count($matches))
                @foreach($matches as $match)
                    <div class="lt-item">
                        <h2 class="lt-title weight-bold">| {{ $match->title }} </h2>
                        <div class="perform">
                            @if(count($match->matchInnings))
                                @foreach($match->matchInnings as $inning)
                                    <div class="inning">
                                        <h6>
                                            {{ $inning->battingTeam->name }}
                                            Innings (20 overs maximum)
                                        </h6>
                                        @if(count($inning->matchInningBatsmens))
                                            <div class="batting">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th width="35%">BATSMEN</th>
                                                            <th width="40%"></th>
                                                            <th width="5%">R</th>
                                                            <th width="5%">B</th>
                                                            <th width="5%">4s</th>
                                                            <th width="5%">6s</th>
                                                            <th width="5%">SR</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($inning->matchInningBatsmens as $player)
                                                            <tr>
                                                                <td>
                                                                    {{ $player->batsman->short_name }}
                                                                    @if($player->is_on_strike && $player->is_batting)
                                                                        <span style="color: red">*</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if($player->is_batting && !$player->has_batted)
                                                                        not out
                                                                    @endif
                                                                </td>
                                                                <td>{{ $player->runs }}</td>
                                                                <td>{{ $player->balls }}</td>
                                                                <td>{{ $player->fours }}</td>
                                                                <td>{{ $player->sixes }}</td>
                                                                <td>{{ $player->strike_rate }}</td>
                                                            </tr>
                                                        @endforeach
                                                        @if(count($inning->matchInningExtras))
                                                            <tr class="sub-res">
                                                                <td colspan="3">Extras</td>
                                                                <td colspan="4">
                                                                    {{ $inning->matchInningExtras[0]->total }}
                                                                    (w {{ $inning->matchInningExtras[0]->wides }}
                                                                    ,
                                                                    nb {{ $inning->matchInningExtras[0]->no_balls }}
                                                                    )
                                                                </td>
                                                            </tr>
                                                        @endif
                                                        <tr class="total">
                                                            <td colspan="3">TOTAL</td>
                                                            <td colspan="4">
                                                                {{ $inning->runs }}/{{ $inning->wickets }}
                                                                ({{ $inning->overs }} Overs,
                                                                RR: {{ $inning->run_rate }})
                                                            </td>
                                                        </tr>
                                                        @if(count($inning->matchInningFows))
                                                            <tr class="fow">
                                                                <td colspan="7">
                                                                    <strong>
                                                                        Fall of Wickets:
                                                                    </strong>
                                                                    @foreach($inning->matchInningFows as $fow)
                                                                        {{ $fow->number }} - {{ $fow->runs }}
                                                                        ({{ $fow->overs }} ov) &nbsp;
                                                                        &nbsp;
                                                                    @endforeach
                                                                </td>
                                                            </tr>
                                                        @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        @endif

                                        @if(count($inning->matchInningBowlers))
                                            <div class="bowling">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th width="50%">BOWLING</th>
                                                            <th width="5%">O</th>
                                                            <th width="5%">M</th>
                                                            <th width="5%">R</th>
                                                            <th width="5%">W</th>
                                                            <th width="5%">ECON</th>
                                                            <th width="5%">0S</th>
                                                            <th width="5%">4S</th>
                                                            <th width="5%">6S</th>
                                                            <th width="5%">WD</th>
                                                            <th width="5%">NB</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($inning->matchInningBowlers as $player)
                                                            <tr>
                                                                <td>
                                                                    {{ $player->bowler->short_name }}
                                                                    @if($player->is_bowling)
                                                                        <span style="color: red">*</span>
                                                                    @endif
                                                                </td>
                                                                <td>{{ $player->overs }}</td>
                                                                <td>{{ $player->maiden }}</td>
                                                                <td>{{ $player->runs }}</td>
                                                                <td>{{ $player->wickets }}</td>
                                                                <td>{{ $player->economy }}</td>
                                                                <td>{{ $player->zeros }}</td>
                                                                <td>{{ $player->fours }}</td>
                                                                <td>{{ $player->sixes }}</td>
                                                                <td>{{ $player->wides }}</td>
                                                                <td>{{ $player->no_balls }}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach

                                @if(count($inning->matchInningPartnerships))
                                    <div class="batting">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th width="35%">Partnerships</th>
                                                    <th width="45%"></th>
                                                    <th width="7%"></th>
                                                    <th width="7%"></th>
                                                    <th width="7%">R</th>
                                                    <th width="7%">B</th>
                                                    <th width="7%">SR</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($inning->matchInningPartnerships as $partnership)
                                                    <tr>
                                                        <td>
                                                            {{ $partnership->batsman1->short_name }}
                                                        </td>
                                                        <td>
                                                            {{ $partnership->batsman2->short_name }}
                                                        </td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>{{ $partnership->runs_contribution }}</td>
                                                        <td>{{ $partnership->balls_faced }}</td>
                                                        <td>{{ $partnership->strike_rate }}</td>
                                                    </tr>
                                                @endforeach
                                                @if(count($inning->matchInningExtras))
                                                    <tr class="sub-res">
                                                        <td colspan="3">Extras</td>
                                                        <td colspan="4">
                                                            {{ $inning->matchInningExtras[0]->total }}
                                                            (w {{ $inning->matchInningExtras[0]->wides }}
                                                            ,
                                                            nb {{ $inning->matchInningExtras[0]->no_balls }}
                                                            )
                                                        </td>
                                                    </tr>
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endif
                            @else
                                <center>
                                    <a href="{{ route('start-matches') }}" class="btn btn-danger">START
                                        MATHCES!!!</a>
                                </center>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>