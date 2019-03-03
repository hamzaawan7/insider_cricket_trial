@extends('layout')

@section('title')
    Home
@endsection

@section('content')
    <!-- page header -->
    <div class="page-head">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="page-title with-crumbs">Matches</h1>
                </div>
                <div class="col-md-5">
                    <div class="icon-right-wrapper">
                        <a href="" class="ii i-print"><img src="images/print-icon.png"></a>
                        <a href="" class="ii i-share"><img src="images/share-icon.png"></a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="xo-crumbs clearboth">
                        <a href="">Community</a>
                        <span>></span>
                        <a href="">Home</a>
                        <span>></span>
                        <a href="">Matches</a>
                        <span>></span>
                        <a href="">West Indies tour of India</a>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- scorecard -->
    <section class="scorecard">
        <div class="container">
            <div class="row">
                <!-- content -->
                <div class="col-md-12">
                    <div class="section-menu">
                        <a href="#" title="" class="active-menu">Scorecard</a>
                        <a href="#" title="">Highlight</a>
                        <a href="#" title="">Photos</a>
                        <a href="#" title="">Photos</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="xo-content">
                        <!-- Tour infor and current match final results -->
                        @if(!empty($match))
                            <div class="tour-info">
                                <div class="tour-header">
                                    <strong>Result</strong>
                                    <p>{{ $match->team1->name }} vs {{ $match->team2->name }},
                                        at {{ $match->venue->name }}</p>
                                </div>
                                <div class="tour-body clearboth">
                                    <div class="flag-info left-info">
                                        <img src="{{ $match->team1->logo }}" alt="">
                                        <h3>{{ $match->team1->abbreviation }} <br>
                                            {{ $match->matchInnings[0]->runs }} / {{ $match->matchInnings[0]->wickets }}
                                            ({{ $match->matchInnings[0]->overs }} ov)
                                        </h3>
                                    </div>
                                    <div class="flag-info right-info">
                                        <img src="{{ $match->team2->logo }}" alt="">
                                        <h3>{{ $match->team2->abbreviation }} <br>
                                            {{ $match->matchInnings[1]->runs }} / {{ $match->matchInnings[1]->wickets }}
                                            ({{ $match->matchInnings[1]->overs }} ov)
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        @endif
                    <!-- each team performance -->
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
                                                                        *
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
                            @else
                                <center>
                                    <a href="{{ route('start-matches') }}" class="btn btn-danger">START
                                        MATHCES!!!</a>
                                </center>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Sidebar -->
                <div class="col-md-3">
                    <div class="xo-sidebar">
                        <div class="vid-review">
                            <img src="images/matches/big-1.jpg" alt="">
                            <div class="rev-text">
                                <a class="play-icon" href=""><span class="fa fa-play"></span></a>
                                <h3>Can West Indies cross the finish-line against near full-strength India?</h3>
                                <p>With the return of Bhuvneshwar and Bumrah, India could finally field a near
                                    full-strength side in the third ODI, with only Hardik.</p>
                            </div>
                        </div>
                        <div class="match-coverage">
                            <h4>Match Coverage</h4>
                            <div class="cov-item clearboth">
                                <img src="images/matches/small-1.jpg" alt="">
                                <div class="cov-item-detail">
                                    <h6>Virat Kohli is Man of the Match </h6>
                                    <p>For his unbeaten 157. "First of all, I would like to say ti was a great game of
                                        circket Full house.</p>
                                </div>
                            </div>
                            <div class="cov-item clearboth">
                                <img src="images/matches/small-2.jpg" alt="">
                                <div class="cov-item-detail">
                                    <h6>Virat Kohli is Man of the Match </h6>
                                    <p>For his unbeaten 157. "First of all, I would like to say ti was a great game of
                                        circket Full house.</p>
                                </div>
                            </div>
                            <div class="cov-item clearboth">
                                <img src="images/matches/small-3.jpg" alt="">
                                <div class="cov-item-detail">
                                    <h6>Virat Kohli is Man of the Match </h6>
                                    <p>For his unbeaten 157. "First of all, I would like to say ti was a great game of
                                        circket Full house.</p>
                                </div>
                            </div>
                        </div>

                        <div class="never-wear">
                            <img src="images/matches/big-2.jpg">
                        </div>
                        <h4>Photos</h4>
                        <div class="photo-gal">
                            <a href="#" title=""><img src="images/matches/small-4.jpg" alt=""></a>
                            <a href="#" title=""><img src="images/matches/small-5.jpg" alt=""></a>
                            <a href="#" title=""><img src="images/matches/small-6.jpg" alt=""></a>
                            <a href="#" title=""><img src="images/matches/small-5.jpg" alt=""></a>
                            <a href="#" title=""><img src="images/matches/small-6.jpg" alt=""></a>
                            <a href="#" title=""><img src="images/matches/small-4.jpg" alt=""></a>
                            <a href="#" title=""><img src="images/matches/small-6.jpg" alt=""></a>
                            <a href="#" title=""><img src="images/matches/small-4.jpg" alt=""></a>
                            <a href="#" title="" class="veiw-all"><img src="images/matches/small-5.jpg"
                                                                       alt=""><span>44+</span></a>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection