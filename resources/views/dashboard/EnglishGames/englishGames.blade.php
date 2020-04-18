@extends('dashboard.layouts.master')

@section('title', 'Dashboard')

@section('main')
        <h2 class="text-center mt-3">Juegos en ingles</h2>
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
                @foreach ($englishGames as $game)
                    <tr>
                        <th>{{ $game->id }}</th>
                        <td scope="row">{{ $game->title }}</td>
                        <td><i class="fas fa-edit"></i></td>
                        <td><i class="far fa-trash-alt"></i></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{ $englishGames->links() }}

        </div>


@endsection

