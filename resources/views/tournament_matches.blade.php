@extends('layout')

@section('title')
    Matches
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

                <div class="container" id="matches-info">
                    @include('_matches')
                </div>
            </div>
        </div>
    </section>
@endsection

@if($matches[0]->match_status_id == 2)
    @section('scripts')
        <script type="text/javascript">
            var auto_refresh = setInterval(
                function () {
                    var url = "{{ route('matches', ['tournament_id' => $tournament_id]) }}";
                    /*$('#matches-info').fadeOut("fast");*/
                    $('#matches-info').load(url, function() {
                        $('#matches-info').fadeIn();
                    });
                }, 5000
            );
        </script>
    @endsection
@endif