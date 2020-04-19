@extends('layouts.master')

@section('title', 'Bienvenido')

@section('main')
    <div class="row nine-games justify-content-around">
        @for ($i = 0; $i < 9; $i++)
            <div class="game-box-nine shadow">
                <img class="game-photo-m flex-fill" src="images/{{$games[0][$i]->title}}.png" alt="">
            </div>
        @endfor
    </div>

    <div class="row six-games-start-left justify-content-start">
        @for ($i = 0; $i < 6; $i++)
            <div class="game-box shadow">
                <img class="game-photo-m flex-fill" src="/images/{{$games[0][$i]->title}}.png" alt="">
            </div>
        @endfor
    </div>

    <div class="row six-games-start-left justify-content-start">
        @for ($i = 0; $i < 6; $i++)
            <div class="game-box shadow">
                <img class="game-photo-m flex-fill" src="/images/{{$games[0][$i]->title}}.png" alt="">
            </div>
        @endfor
    </div>

    <div class="row six-games-start-left justify-content-start">
        @for ($i = 0; $i < 6; $i++)
            <div class="game-box shadow">
                <img class="game-photo-m flex-fill" src="/images/{{$games[0][$i]->title}}.png" alt="">
            </div>
        @endfor
    </div>

    <div class="publicity-right-1">

    </div>

    <div class="row nine-games justify-content-around">
        @for ($i = 0; $i < 9; $i++)
            <div class="game-box-nine shadow">
                <img class="game-photo-m flex-fill" src="images/{{$games[0][$i]->title}}.png" alt="">
            </div>
        @endfor
    </div>

    <div class="row six-games-start-right justify-content-end">
        @for ($i = 0; $i < 6; $i++)
            <div class="game-box shadow">
                <img class="game-photo-m flex-fill" src="/images/{{$games[0][$i]->title}}.png" alt="">
            </div>
        @endfor
    </div>

    <div class="row six-games-start-right justify-content-end">
        @for ($i = 0; $i < 6; $i++)
            <div class="game-box shadow">
                <img class="game-photo-m flex-fill" src="/images/{{$games[0][$i]->title}}.png" alt="">
            </div>
        @endfor
    </div>

    <div class="row six-games-start-right justify-content-end">
        @for ($i = 0; $i < 6; $i++)
            <div class="game-box shadow">
                <img class="game-photo-m flex-fill" src="/images/{{$games[0][$i]->title}}.png" alt="">
            </div>
        @endfor
    </div>

    <div class="publicity-left-1">

    </div>

    <div class="row nine-games justify-content-around">
        @for ($i = 0; $i < 9; $i++)
            <div class="game-box-nine shadow">
                <img class="game-photo-m flex-fill" src="images/{{$games[0][$i]->title}}.png" alt="">
            </div>
        @endfor
    </div>

    <div class="row six-games-start-left justify-content-start">
        @for ($i = 0; $i < 6; $i++)
            <div class="game-box shadow">
                <img class="game-photo-m flex-fill" src="/images/{{$games[0][$i]->title}}.png" alt="">
            </div>
        @endfor
    </div>

    <div class="row six-games-start-left justify-content-start">
        @for ($i = 0; $i < 6; $i++)
            <div class="game-box shadow">
                <img class="game-photo-m flex-fill" src="/images/{{$games[0][$i]->title}}.png" alt="">
            </div>
        @endfor
    </div>

    <div class="row six-games-start-left justify-content-start">
        @for ($i = 0; $i < 6; $i++)
            <div class="game-box shadow">
                <img class="game-photo-m flex-fill" src="/images/{{$games[0][$i]->title}}.png" alt="">
            </div>
        @endfor
    </div>

    <div class="publicity-right-2">

    </div>

    <div class="row nine-games justify-content-around">
        @for ($i = 0; $i < 9; $i++)
            <div class="game-box-nine shadow">
                <img class="game-photo-m flex-fill" src="images/{{$games[0][$i]->title}}.png" alt="">
            </div>
        @endfor
    </div>

    <div class="row nine-games justify-content-around">
        @for ($i = 0; $i < 9; $i++)
            <div class="game-box-nine shadow">
                <img class="game-photo-m flex-fill" src="images/{{$games[0][$i]->title}}.png" alt="">
            </div>
        @endfor
    </div>

@endsection
