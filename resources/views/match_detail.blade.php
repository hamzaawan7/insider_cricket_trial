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
                        <div class="tour-info">
                            <div class="tour-header">
                                <strong>Result</strong>
                                <p>2nd ODI (D/N), West Indies tour of India at Visakhapatnam, Oct 24 2018</p>
                            </div>
                            <div class="tour-body clearboth">
                                <div class="flag-info left-info">
                                    <img src="images/matches/india.png" alt="">
                                    <h3>india <br>321/6</h3>
                                </div>
                                <div class="flag-info right-info">
                                    <img src="images/matches/west-indies.png" alt="">
                                    <h3>West Indies <br>321/7 (50 ov)</h3>
                                </div>
                                <h4 class="score-result">Match tied</h4>
                            </div>
                        </div>
                        <!-- each team performance -->
                        <div class="perform">
                            <div class="inning">
                                <h6>India Innings (50 overs maximum)</h6>
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
                                            <tr>
                                                <td>RG Sharma</td>
                                                <td>c Hetmyer b Roach</td>
                                                <td>4</td>
                                                <td>8</td>
                                                <td>1</td>
                                                <td>0</td>
                                                <td>50.00</td>
                                            </tr>
                                            <tr>
                                                <td>S Dhawan</td>
                                                <td>lbw b Nurse</td>
                                                <td>1</td>
                                                <td>8</td>
                                                <td>1</td>
                                                <td>0</td>
                                                <td>96.66</td>
                                            </tr>
                                            <tr>
                                                <td>V Kohli (c)</td>
                                                <td>not out</td>
                                                <td>0</td>
                                                <td>8</td>
                                                <td>1</td>
                                                <td>0</td>
                                                <td>50.00</td>
                                            </tr>
                                            <tr>
                                                <td>AT Rayudu</td>
                                                <td>b Nurse</td>
                                                <td>1</td>
                                                <td>8</td>
                                                <td>1</td>
                                                <td>0</td>
                                                <td>96.66</td>
                                            </tr>
                                            <tr>
                                                <td>MS Dhoni †</td>
                                                <td>c Hetmyer b Roach</td>
                                                <td>0</td>
                                                <td>8</td>
                                                <td>1</td>
                                                <td>0</td>
                                                <td>50.00</td>
                                            </tr>
                                            <tr>
                                                <td>RR Pant</td>
                                                <td>lbw b Nurse</td>
                                                <td>1</td>
                                                <td>8</td>
                                                <td>1</td>
                                                <td>0</td>
                                                <td>96.66</td>
                                            </tr>
                                            <tr>
                                                <td>RA Jadeja</td>
                                                <td>not out</td>
                                                <td>0</td>
                                                <td>8</td>
                                                <td>1</td>
                                                <td>0</td>
                                                <td>50.00</td>
                                            </tr>
                                            <tr>
                                                <td>Mohammed Shami</td>
                                                <td>b Nurse</td>
                                                <td>1</td>
                                                <td>8</td>
                                                <td>1</td>
                                                <td>0</td>
                                                <td>96.66</td>
                                            </tr>
                                            <tr class="sub-res">
                                                <td colspan="3">Extras</td>
                                                <td colspan="4">8 (lb 3, w 5)</td>
                                            </tr>
                                            <tr class="total">
                                                <td colspan="3">TOTAL</td>
                                                <td colspan="4">321/6 (50 Overs, RR: 6.42)</td>
                                            </tr>
                                            <tr class="dnb">
                                                <td colspan="7"><strong>Did not bat:</strong> YS Chahal, UT Yadav,
                                                    Kuldeep Yadav
                                                </td>
                                            </tr>
                                            <tr class="fow">
                                                <td colspan="7"><strong>Fall of wickets:</strong> 1-15 (RG Sharma, 3.1
                                                    ov), 2-40 (S Dhawan, 8.4 ov), 3-179 (AT Rayudu, 32.2 ov), 4-222 (MS
                                                    Dhoni, 40.2 ov), 5-248 <br>(RR Pant, 43.3 ov), 6-307 (RA Jadeja,
                                                    48.5 ov)
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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
                                            <tr>
                                                <td>JO Holder</td>
                                                <td>6</td>
                                                <td>0</td>
                                                <td>50</td>
                                                <td>0</td>
                                                <td>8.33</td>
                                                <td>16</td>
                                                <td>9</td>
                                                <td>0</td>
                                                <td>1</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td>KAJ Roach</td>
                                                <td>6</td>
                                                <td>0</td>
                                                <td>50</td>
                                                <td>0</td>
                                                <td>8.33</td>
                                                <td>16</td>
                                                <td>9</td>
                                                <td>0</td>
                                                <td>1</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td>AR Nurse</td>
                                                <td>6</td>
                                                <td>0</td>
                                                <td>50</td>
                                                <td>0</td>
                                                <td>8.33</td>
                                                <td>16</td>
                                                <td>9</td>
                                                <td>0</td>
                                                <td>1</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td>D Bishoo</td>
                                                <td>6</td>
                                                <td>0</td>
                                                <td>50</td>
                                                <td>0</td>
                                                <td>8.33</td>
                                                <td>16</td>
                                                <td>9</td>
                                                <td>0</td>
                                                <td>1</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td>OC McCoy</td>
                                                <td>6</td>
                                                <td>0</td>
                                                <td>50</td>
                                                <td>0</td>
                                                <td>8.33</td>
                                                <td>16</td>
                                                <td>9</td>
                                                <td>0</td>
                                                <td>1</td>
                                                <td>0</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="inning">
                                <h6>Westindies Innings (50 overs maximum)</h6>
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
                                            <tr>
                                                <td>RG Sharma</td>
                                                <td>c Hetmyer b Roach</td>
                                                <td>4</td>
                                                <td>8</td>
                                                <td>1</td>
                                                <td>0</td>
                                                <td>50.00</td>
                                            </tr>
                                            <tr>
                                                <td>S Dhawan</td>
                                                <td>lbw b Nurse</td>
                                                <td>1</td>
                                                <td>8</td>
                                                <td>1</td>
                                                <td>0</td>
                                                <td>96.66</td>
                                            </tr>
                                            <tr>
                                                <td>V Kohli (c)</td>
                                                <td>not out</td>
                                                <td>0</td>
                                                <td>8</td>
                                                <td>1</td>
                                                <td>0</td>
                                                <td>50.00</td>
                                            </tr>
                                            <tr>
                                                <td>AT Rayudu</td>
                                                <td>b Nurse</td>
                                                <td>1</td>
                                                <td>8</td>
                                                <td>1</td>
                                                <td>0</td>
                                                <td>96.66</td>
                                            </tr>
                                            <tr>
                                                <td>MS Dhoni †</td>
                                                <td>c Hetmyer b Roach</td>
                                                <td>0</td>
                                                <td>8</td>
                                                <td>1</td>
                                                <td>0</td>
                                                <td>50.00</td>
                                            </tr>
                                            <tr>
                                                <td>RR Pant</td>
                                                <td>lbw b Nurse</td>
                                                <td>1</td>
                                                <td>8</td>
                                                <td>1</td>
                                                <td>0</td>
                                                <td>96.66</td>
                                            </tr>
                                            <tr>
                                                <td>RA Jadeja</td>
                                                <td>not out</td>
                                                <td>0</td>
                                                <td>8</td>
                                                <td>1</td>
                                                <td>0</td>
                                                <td>50.00</td>
                                            </tr>
                                            <tr>
                                                <td>Mohammed Shami</td>
                                                <td>b Nurse</td>
                                                <td>1</td>
                                                <td>8</td>
                                                <td>1</td>
                                                <td>0</td>
                                                <td>96.66</td>
                                            </tr>
                                            <tr class="sub-res">
                                                <td colspan="3">Extras</td>
                                                <td colspan="4">8 (lb 3, w 5)</td>
                                            </tr>
                                            <tr class="total">
                                                <td colspan="3">TOTAL</td>
                                                <td colspan="4">321/6 (50 Overs, RR: 6.42)</td>
                                            </tr>
                                            <tr class="dnb">
                                                <td colspan="7"><strong>Did not bat:</strong> YS Chahal, UT Yadav,
                                                    Kuldeep Yadav
                                                </td>
                                            </tr>
                                            <tr class="fow">
                                                <td colspan="7"><strong>Fall of wickets:</strong> 1-15 (RG Sharma, 3.1
                                                    ov), 2-40 (S Dhawan, 8.4 ov), 3-179 (AT Rayudu, 32.2 ov), 4-222 (MS
                                                    Dhoni, 40.2 ov), 5-248 <br>(RR Pant, 43.3 ov), 6-307 (RA Jadeja,
                                                    48.5 ov)
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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
                                            <tr>
                                                <td>JO Holder</td>
                                                <td>6</td>
                                                <td>0</td>
                                                <td>50</td>
                                                <td>0</td>
                                                <td>8.33</td>
                                                <td>16</td>
                                                <td>9</td>
                                                <td>0</td>
                                                <td>1</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td>KAJ Roach</td>
                                                <td>6</td>
                                                <td>0</td>
                                                <td>50</td>
                                                <td>0</td>
                                                <td>8.33</td>
                                                <td>16</td>
                                                <td>9</td>
                                                <td>0</td>
                                                <td>1</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td>AR Nurse</td>
                                                <td>6</td>
                                                <td>0</td>
                                                <td>50</td>
                                                <td>0</td>
                                                <td>8.33</td>
                                                <td>16</td>
                                                <td>9</td>
                                                <td>0</td>
                                                <td>1</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td>D Bishoo</td>
                                                <td>6</td>
                                                <td>0</td>
                                                <td>50</td>
                                                <td>0</td>
                                                <td>8.33</td>
                                                <td>16</td>
                                                <td>9</td>
                                                <td>0</td>
                                                <td>1</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td>OC McCoy</td>
                                                <td>6</td>
                                                <td>0</td>
                                                <td>50</td>
                                                <td>0</td>
                                                <td>8.33</td>
                                                <td>16</td>
                                                <td>9</td>
                                                <td>0</td>
                                                <td>1</td>
                                                <td>0</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- series status -->
                        <h3 class="series-status all-caps">India led the 5-match series 1-0</h3>
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