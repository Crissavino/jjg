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

@endsection

