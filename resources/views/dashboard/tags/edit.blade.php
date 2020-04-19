@extends('dashboard.layouts.master')

@section('title', 'Dashboard')

@section('main')
    <div class="container">
        <h2 class="text-center mt-3">{{ $tag->title }}</h2>
        <div class="row">
            <div class="col-md-12">
                @if(count($errors) !== 0)
                    <div class="alert alert-danger" role="alert">

                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>

                    </div>
                @endif
            </div>
            <form class="form col-md-12 mt-5 mb-5" name="form" onsubmit="validateForm()" action="" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Titulo del juego</label> <span style="color:red">*</span>
                    <input type="text" name="title" class="form-control" placeholder="Título del juego"
                           value="{{$tag->title}}">
                </div>

                <ul>
                    @foreach ($tag->games as $game)
                        <li>{{ $game->title  }}</li>
                    @endforeach
                </ul>


                <button type="submit" class="btn btn-primary btn-block">
                    Guardar
                </button>
            </form>
        </div>
    </div>
@endsection
