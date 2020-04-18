@extends('dashboard.layouts.master')

@section('title', 'Dashboard')

@section('main')

    <h2 class="text-center mt-3">Juegos en espanol</h2>

    <div class="col-6 ml-5">
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
            @foreach ($spanishGames as $game)
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

        {{ $spanishGames->links() }}

    </div>

@endsection

