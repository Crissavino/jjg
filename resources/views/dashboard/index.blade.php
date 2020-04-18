@extends('dashboard.layouts.master')

@section('title', 'Dashboard')

@section('main')
    <h2 class="text-center mt-3">Todos los juegos</h2>
    @if (session('status'))
        <div class="alert alert-success col-12">
            {{ session('status') }}
        </div>
    @endif
    <div class="row">
        <div class="col-6 ml-5 d-block">
            <table class="table mt-5">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titulo</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                {{--            @foreach ($englishGames as $game)--}}
                {{--                <tr>--}}
                {{--                    <th>{{ $game->id }}</th>--}}
                {{--                    <td scope="row">{{ $game->title }}</td>--}}
{{--                                    <td><i class="fas fa-edit"></i></td>--}}
{{--                                    <td><i class="far fa-trash-alt"></i></td>--}}
                {{--                </tr>--}}
                {{--            @endforeach--}}
                </tbody>
            </table>

            {{--        {{ $englishGames->links() }}--}}
        </div>

        <div class="col-5 mt-5 d-block">
            <a class="btn btn-primary mb-4" href="{{route('dashboard/game/create')}}" role="button">
                Agregar juego nuevo
            </a>

            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2 col-6" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>

        </div>
    </div>
@endsection
