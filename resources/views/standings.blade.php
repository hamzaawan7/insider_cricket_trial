@extends('layout')

@section('title')
    Standings
@endsection

@section('content')
    <!-- scorecard -->
    <section class="scorecard">
        <div class="container">
            <div class="row">
                <!-- content -->
                <div class="col-md-9">
                    <div class="xo-content">
                        <!-- Tour infor and current match final results -->
                        <div class="tour-info">
                            <div class="tour-header">
                                <div class="xo-crumbs clearboth">
                                    <a href="#" onclick="return false">Insider</a>
                                    <span>></span>
                                    <a href="{{ route('home') }}">Matches</a>
                                    <span>></span>
                                    <a href="#" onclick="return false">Standings</a>
                                </div>
                            </div>
                        </div>
                        <!-- each team performance -->
                        <div class="perform">
                            <div class="inning">
                                <div class="batting">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th width="25%"></th>
                                                <th width="40%"></th>
                                                <th width="8%">M</th>
                                                <th width="8%">W</th>
                                                <th width="8%">L</th>
                                                <th width="11%">Points</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(!empty($standings))
                                                @foreach($standings as $standing)
                                                    <tr>
                                                        <td><img src="{{ $standing->team->logo }}" width="100"
                                                                 height="100" alt="{{ $standing->team->name }}"></td>
                                                        <td class="pad-top-standing"><b>{{ $standing->team->name }}</b>
                                                        </td>
                                                        <td class="pad-top-standing">{{ $standing->matches_played }}</td>
                                                        <td class="pad-top-standing">{{ $standing->won }}</td>
                                                        <td class="pad-top-standing">{{ $standing->lost }}</td>
                                                        <td class="pad-top-standing">{{ $standing->points }}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
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

                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection