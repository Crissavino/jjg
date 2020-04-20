@extends('layouts.master')

@section('title', 'Bienvenido')

@section('main')
    <div class="row">
        <div class="col-8 games" style="width: 100%">
            @foreach ($games as $game)
                <div class="game-box shadow p-0 mt-0">
                    <img class="game-photo-m flex-fill" src="images/{{$game->title}}.png" alt="">
                </div>
            @endforeach
        </div>

        <div class="col-4 publicity">
            <div class="publicity-block">
            </div>

            <div class="publicity-block">
            </div>

            <div class="publicity-block">
            </div>

            <div class="publicity-block">
            </div>

            <div class="publicity-block">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 games" style="width: 100%">
            @foreach ($firstTwelveGames as $game)
                <div class="game-box-twelve shadow p-0 mt-0">
                    <img class="game-photo-m flex-fill" src="images/{{$game->title}}.png" alt="">
                </div>
            @endforeach
        </div>
    </div>

    <div class="row">
        <div class="col-12 games" style="width: 100%">
            @foreach ($secondTwelveGames as $game)
                <div class="game-box-twelve shadow p-0 mt-0">
                    <img class="game-photo-m flex-fill" src="images/{{$game->title}}.png" alt="">
                </div>
            @endforeach
        </div>
    </div>
{{--    <div class="row nine-games">--}}
{{--        @foreach ($firstNineGames as $game)--}}
{{--            <div class="game-box shadow">--}}
{{--                <img class="game-photo-m flex-fill" src="images/{{$game->title}}.png" alt="">--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--    </div>--}}

{{--    <div class="row d-inline-flex">--}}
{{--        <div class="col-xs-12 col-sm-12 four-vertical-games">--}}
{{--            @foreach ($firstFourGames as $game)--}}
{{--                <div class="game-box shadow">--}}
{{--                    <img class="game-photo-m flex-fill" src="images/{{$game->title}}.png" alt="">--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}

{{--        <div class="publicity col-xs-9 col-sm-8 p-0 m-0 justify-content-end">--}}
{{--        </div>--}}
{{--    </div>--}}




{{--    <div class="publicity-left-1 justify-content-start">--}}

{{--    </div>--}}

{{--    <div class="publicity-right-2 justify-content-end">--}}

{{--    </div>--}}

    {{--    <div class="row six-games-start-right justify-content-end">--}}
    {{--        @for ($i = 0; $i < 6; $i++)--}}
    {{--            <div class="game-box shadow">--}}
    {{--                <img class="game-photo-m flex-fill" src="/images/{{$games[0][$i]->title}}.png" alt="">--}}
    {{--            </div>--}}
    {{--        @endfor--}}
    {{--    </div>--}}

    {{--    <div class="row six-games-start-left justify-content-start">--}}
    {{--        @for ($i = 0; $i < 6; $i++)--}}
    {{--            <div class="game-box shadow">--}}
    {{--                <img class="game-photo-m flex-fill" src="/images/{{$games[0][$i]->title}}.png" alt="">--}}
    {{--            </div>--}}
    {{--        @endfor--}}
    {{--    </div>--}}

@endsection
