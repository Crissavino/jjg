@extends('dashboard.layouts.master')

@section('title', 'Dashboard')

@section('main')

    <h2 class="text-center mt-3">Tags</h2>

    <div class="m-auto col-sm-8 ml-5">
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
            @foreach ($tags as $tag)
                <tr>
                    <th>{{ $tag->id }}</th>
                    <td scope="row">{{ $tag->title }}</td>
                    <td>
                        <a href="{{route('dashboard/tag/edit', ['id' => $tag->id])}}" style="color: white">
                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="fas fa-edit"></i>
                            </button>
                        </a>
                    </td>
                    <td>
                        <form class="form" name="form" action="{{route('dashboard/tag/delete', ['id' => $tag->id])}}" method="post">
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

        {{ $tags->links() }}

    </div>

@endsection

