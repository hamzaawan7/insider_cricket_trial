@extends('layout')

@section('title')
    Home
@endsection

@section('content')
    <!-- scorecard -->
    <section class="cric-ongoing">
        <div class="container">
            <div class="row">
                <!-- Tour infor and current match final results -->
                <div class="col-md-12">
                    <div class="tour-info">
                    <div class="tour-header">
                        <div class="xo-crumbs clearboth">
                            <a href="#" onclick="return false">Insider</a>
                            <span>></span>
                            <a href="#" onclick="return false">Matches</a>
                            <span>></span>
                            <a href="{{ route('standings') }}">Standings</a>
                        </div>
                    </div>
                </div>
                </div>

                <div class="col-md-12">
                    <div class="rs-item" data-slidertitle="IND v WI">
                        <div class="result-card">
                            <div class="reslt-head clearboth">
                                <img src="images/westindies.png" alt="">
                                <img src="images/india.png" alt="">
                                <div class="stream text-dark-red">
                                    <span class="all-caps">Live</span>
                                    <span class="stream-icon"></span>
                                </div>
                            </div>
                            <div class="result-content">
                                <span class="result-title d-block">India v West Indies - 2nd ODI</span>
                                <span class="sub-title">At Visakhapatnam</span>
                                <div class="runs">
                                    <p><span class="result-title all-caps">Ind</span>321/6 (11 ov)</p>
                                    <p><span class="result-title all-caps">Wi</span>321/7 (20 OV, Target 196)</p>
                                </div>
                                <a href="#" class="trans-btn text-blue btn">Match Overview <span
                                            class="btn-icon fa fa-chevron-right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="rs-item" data-slidertitle="IND v WI">
                        <div class="result-card">
                            <div class="reslt-head clearboth">
                                <img src="images/westindies.png" alt="">
                                <img src="images/india.png" alt="">
                                <div class="stream text-dark-red">
                                    <span class="all-caps">Live</span>
                                    <span class="stream-icon"></span>
                                </div>
                            </div>
                            <div class="result-content">
                                <span class="result-title d-block">India v West Indies - 2nd ODI</span>
                                <span class="sub-title">At Visakhapatnam</span>
                                <div class="runs">
                                    <p><span class="result-title all-caps">Ind</span>321/6 (11 ov)</p>
                                    <p><span class="result-title all-caps">Wi</span>321/7 (20 OV, Target 196)</p>
                                </div>
                                <a href="#" class="trans-btn text-blue btn">Match Overview <span
                                            class="btn-icon fa fa-chevron-right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="rs-item" data-slidertitle="IND v WI">
                        <div class="result-card">
                            <div class="reslt-head clearboth">
                                <img src="images/westindies.png" alt="">
                                <img src="images/india.png" alt="">
                                <div class="stream text-dark-red">
                                    <span class="all-caps">Live</span>
                                    <span class="stream-icon"></span>
                                </div>
                            </div>
                            <div class="result-content">
                                <span class="result-title d-block">India v West Indies - 2nd ODI</span>
                                <span class="sub-title">At Visakhapatnam</span>
                                <div class="runs">
                                    <p><span class="result-title all-caps">Ind</span>321/6 (11 ov)</p>
                                    <p><span class="result-title all-caps">Wi</span>321/7 (20 OV, Target 196)</p>
                                </div>
                                <a href="#" class="trans-btn text-blue btn">Match Overview <span
                                            class="btn-icon fa fa-chevron-right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="rs-item" data-slidertitle="IND v WI">
                        <div class="result-card">
                            <div class="reslt-head clearboth">
                                <img src="images/westindies.png" alt="">
                                <img src="images/india.png" alt="">
                                <div class="stream text-dark-red">
                                    <span class="all-caps">Live</span>
                                    <span class="stream-icon"></span>
                                </div>
                            </div>
                            <div class="result-content">
                                <span class="result-title d-block">India v West Indies - 2nd ODI</span>
                                <span class="sub-title">At Visakhapatnam</span>
                                <div class="runs">
                                    <p><span class="result-title all-caps">Ind</span>321/6 (11 ov)</p>
                                    <p><span class="result-title all-caps">Wi</span>321/7 (20 OV, Target 196)</p>
                                </div>
                                <a href="#" class="trans-btn text-blue btn">Match Overview <span
                                            class="btn-icon fa fa-chevron-right"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12" style="margin-top: 40px; border-top: 2px solid;">
                    <div id="lt-nav" class="poped league-top-nav clearboth"></div>
                    <div class="leages-tables lt-2">
                        <div class="lt-slider">
                            <div class="lt-item">
                                <h2 class="lt-title weight-bold">| 1st Match </h2>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th width="" colspan="9"><span>International Tours</span></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td width="20%" class="elapsed-time">05 December 2018</td>
                                            <td width="10%" class="text-r"><img src="images/leagues/Layer-78.jpg"></td>
                                            <td width="15%">Australia</td>
                                            <td width="10%" class="text-c">VS</td>
                                            <td width="15%" class="text-r">India</td>
                                            <td width="10%"><img src="images/leagues/Layer-78.jpg"></td>
                                            <td width="20%" class="detailed-tag text-r"><a href=""
                                                                                           class="live-tag taged">Details</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20%" class="elapsed-time">05 December 2018</td>
                                            <td width="10%" class="text-r"><img src="images/leagues/Layer-78.jpg"></td>
                                            <td width="15%">Sri Lanka</td>
                                            <td width="10%" class="text-c">VS</td>
                                            <td width="15%" class="text-r">England</td>
                                            <td width="10%"><img src="images/leagues/Layer-78.jpg"></td>
                                            <td width="20%" class="detailed-tag text-r"><a href=""
                                                                                           class="live-tag taged">Details</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20%" class="elapsed-time">05 December 2018</td>
                                            <td width="10%" class="text-r"><img src="images/leagues/Layer-78.jpg"></td>
                                            <td width="15%">Pakistan</td>
                                            <td width="10%" class="text-c">VS</td>
                                            <td width="15%" class="text-r">New Zealand</td>
                                            <td width="10%"><img src="images/leagues/Layer-78.jpg"></td>
                                            <td width="20%" class="detailed-tag text-r"><a href=""
                                                                                           class="live-tag taged">Details</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20%" class="elapsed-time">05 December 2018</td>
                                            <td width="10%" class="text-r"><img src="images/leagues/Layer-78.jpg"></td>
                                            <td width="15%">Bangladesh</td>
                                            <td width="10%" class="text-c">VS</td>
                                            <td width="15%" class="text-r">West Indies</td>
                                            <td width="10%"><img src="images/leagues/Layer-78.jpg"></td>
                                            <td width="20%" class="detailed-tag text-r"><a href=""
                                                                                           class="live-tag taged">Details</a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="lt-item">
                                <h2 class="lt-title weight-bold">| 2nd Match </h2>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th width="" colspan="9"><span>International Tours</span></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td width="20%" class="elapsed-time">05 December 2018</td>
                                            <td width="10%" class="text-r"><img src="images/leagues/Layer-78.jpg"></td>
                                            <td width="15%">Australia</td>
                                            <td width="10%" class="text-c">VS</td>
                                            <td width="15%" class="text-r">India</td>
                                            <td width="10%"><img src="images/leagues/Layer-78.jpg"></td>
                                            <td width="20%" class="detailed-tag text-r"><a href=""
                                                                                           class="live-tag taged">Details</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20%" class="elapsed-time">05 December 2018</td>
                                            <td width="10%" class="text-r"><img src="images/leagues/Layer-78.jpg"></td>
                                            <td width="15%">Sri Lanka</td>
                                            <td width="10%" class="text-c">VS</td>
                                            <td width="15%" class="text-r">England</td>
                                            <td width="10%"><img src="images/leagues/Layer-78.jpg"></td>
                                            <td width="20%" class="detailed-tag text-r"><a href=""
                                                                                           class="live-tag taged">Details</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20%" class="elapsed-time">05 December 2018</td>
                                            <td width="10%" class="text-r"><img src="images/leagues/Layer-78.jpg"></td>
                                            <td width="15%">Pakistan</td>
                                            <td width="10%" class="text-c">VS</td>
                                            <td width="15%" class="text-r">New Zealand</td>
                                            <td width="10%"><img src="images/leagues/Layer-78.jpg"></td>
                                            <td width="20%" class="detailed-tag text-r"><a href=""
                                                                                           class="live-tag taged">Details</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20%" class="elapsed-time">05 December 2018</td>
                                            <td width="10%" class="text-r"><img src="images/leagues/Layer-78.jpg"></td>
                                            <td width="15%">Bangladesh</td>
                                            <td width="10%" class="text-c">VS</td>
                                            <td width="15%" class="text-r">West Indies</td>
                                            <td width="10%"><img src="images/leagues/Layer-78.jpg"></td>
                                            <td width="20%" class="detailed-tag text-r"><a href=""
                                                                                           class="live-tag taged">Details</a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="lt-item">
                                <h2 class="lt-title weight-bold">| 3rd Match </h2>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th width="" colspan="9"><span>International Tours</span></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td width="20%" class="elapsed-time">05 December 2018</td>
                                            <td width="10%" class="text-r"><img src="images/leagues/Layer-78.jpg"></td>
                                            <td width="15%">Australia</td>
                                            <td width="10%" class="text-c">VS</td>
                                            <td width="15%" class="text-r">India</td>
                                            <td width="10%"><img src="images/leagues/Layer-78.jpg"></td>
                                            <td width="20%" class="detailed-tag text-r"><a href=""
                                                                                           class="live-tag taged">Details</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20%" class="elapsed-time">05 December 2018</td>
                                            <td width="10%" class="text-r"><img src="images/leagues/Layer-78.jpg"></td>
                                            <td width="15%">Sri Lanka</td>
                                            <td width="10%" class="text-c">VS</td>
                                            <td width="15%" class="text-r">England</td>
                                            <td width="10%"><img src="images/leagues/Layer-78.jpg"></td>
                                            <td width="20%" class="detailed-tag text-r"><a href=""
                                                                                           class="live-tag taged">Details</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20%" class="elapsed-time">05 December 2018</td>
                                            <td width="10%" class="text-r"><img src="images/leagues/Layer-78.jpg"></td>
                                            <td width="15%">Pakistan</td>
                                            <td width="10%" class="text-c">VS</td>
                                            <td width="15%" class="text-r">New Zealand</td>
                                            <td width="10%"><img src="images/leagues/Layer-78.jpg"></td>
                                            <td width="20%" class="detailed-tag text-r"><a href=""
                                                                                           class="live-tag taged">Details</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20%" class="elapsed-time">05 December 2018</td>
                                            <td width="10%" class="text-r"><img src="images/leagues/Layer-78.jpg"></td>
                                            <td width="15%">Bangladesh</td>
                                            <td width="10%" class="text-c">VS</td>
                                            <td width="15%" class="text-r">West Indies</td>
                                            <td width="10%"><img src="images/leagues/Layer-78.jpg"></td>
                                            <td width="20%" class="detailed-tag text-r"><a href=""
                                                                                           class="live-tag taged">Details</a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection