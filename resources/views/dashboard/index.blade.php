@extends('dashboard.layouts.master')

@section('title', 'Dashboard')

@section('main')
    <h2 class="text-center mt-3">Dashboard</h2>
    @if (session('status'))
        <div class="alert alert-success col-12">
            {{ session('status') }}
        </div>
    @endif
    <div class="row ml-5">
        <a class="btn btn-primary mt-3 mb-4 col-sm-4" href="{{route('dashboard/game/create')}}" role="button">
            Agregar juego nuevo
        </a>

        <div class="col-6 mt-3 col-sm-8">
            <form class="form-inline my-2 my-lg-0" action="{{route('dashboard/searchGames')}}" method="get">
                <input class="form-control mr-sm-2 col-sm-8" name="searchGame" type="search" placeholder="Buscar juego"
                       aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar juego</button>
            </form>
        </div>
    </div>

    <div class="row ml-5">
        <a class="btn btn-primary mt-3 mb-4 col-sm-4" href="{{route('dashboard/tag/create')}}" role="button">
            Agregar juego tag
        </a>

        <div class="col-6 mt-3 col-sm-8">
            <form class="form-inline my-2 my-lg-0" action="{{route('dashboard/searchTags')}}" method="get">
                <input class="form-control mr-sm-2 col-sm-8" type="search" name="searchTag" placeholder="Buscar tag"
                       aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar tag</button>
            </form>
        </div>
    </div>

    @if (isset($games))
        <div class="row">
            <div class="m-auto col-sm-8">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titulo</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($games as $game)
                        <tr>
                            <th>{{ $game->id }}</th>
                            <td scope="row">{{ $game->title }}</td>
                            <td>
                                <a href="{{route('dashboard/game/edit', ['id' => $game->id])}}">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                            <td><i class="far fa-trash-alt"></i></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $games->links() }}
            </div>
        </div>
    @endif

    @if (isset($tags))
        <div class="row">
            <div class="m-auto col-sm-8">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titulo</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <th>{{ $tag->id }}</th>
                            <td scope="row">{{ $tag->title }}</td>
                            <td>
                                <a href="{{route('dashboard/tag/edit', ['id' => $tag->id])}}">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                            <td><i class="far fa-trash-alt"></i></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {{ $tags->links() }}
            </div>
        </div>
    @endif



@endsection
