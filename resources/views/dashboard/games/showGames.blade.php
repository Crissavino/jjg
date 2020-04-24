@extends('dashboard.layouts.master')

@section('title', 'Dashboard')

@section('main')

    <h2 class="text-center mt-3 mb-5">Juegos</h2>

    <div class="m-auto col-sm-8 ml-5">
        {{ $games->links() }}

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
            @foreach ($games as $game)
                <tr>
                    <th>{{ $game->id }}</th>
                    <td scope="row">{{ $game->title }}</td>
                    <td>
                        <a href="{{route('dashboard/game/edit', ['id' => $game->id])}}" style="color: white">
                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="fas fa-edit"></i>
                            </button>
                        </a>
                    </td>
                    <td>
                        <form class="form" name="form" action="{{route('dashboard/game/delete', ['id' => $game->id])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-block">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $games->links() }}

    </div>

@endsection

