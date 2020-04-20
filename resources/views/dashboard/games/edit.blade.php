@extends('dashboard.layouts.master')

@section('title', 'Dashboard')

@section('main')
    <div class="container">
        <h2 class="text-center mt-3">{{ $game->title }}</h2>
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
            <form class="form col-md-12 mt-5" name="form" onsubmit="validateForm()" action="" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Titulo del juego</label> <span style="color:red">*</span>
                    <input type="text" name="title" class="form-control" placeholder="Título del juego"
                           value="{{$game->title}}">
                </div>

                <div class="iframe text-center d-block">
                    {!!$game->iframe!!}
                </div>
                <button class="btn btn-info btn-block" onclick="hideIframe()" id="hideButton">Ocultar vista previa</button>
                <button class="btn btn-secondary btn-block" onclick="showIframe()" id="showButton">Mostrar vista previa</button>

                <div class="form-group">
                    <label for="">Descripcion del juego</label> <span style="color:red">*</span>
                    <textarea class="form-control" name="description" id=""
                              rows="5">{{$game->description}}</textarea>
                </div>

                <div class="form-group">
                    <label for="">Instruccion del juego</label> <span style="color:red">*</span>
                    <textarea class="form-control" name="instruction" id=""
                              rows="3">{{$game->instruction}}</textarea>
                </div>

                <div class="mt-3 mb-3">
                    <label class="d-block" for="">Atributos</label>
                    <div class="form-check form-check-inline">
                        @php
                            if ($game->mostPlayed){
                                $mostPlayedChecked = 'checked';
                            }else {
                                $mostPlayedChecked = '';
                            }
                        @endphp
                        <input {{$mostPlayedChecked}} class="form-check-input" type="checkbox" id="" name="mostPlayed"
                               value="1">
                        <label class="form-check-label" for="inlineCheckbox1">Mas jugado</label>
                    </div>
                    <div class="form-check form-check-inline">
                        @php
                            if ($game->topRated){
                                $topRatedChecked = 'checked';
                            }else {
                                $topRatedChecked = '';
                            }
                        @endphp
                        <input {{$topRatedChecked}} class="form-check-input" type="checkbox" id="" name="topRated"
                               value="1">
                        <label class="form-check-label" for="inlineCheckbox2">Mas puntuado</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Aca irian los tags</label> <span style="color:red">*</span>
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    Guardar
                </button>
            </form>
            <form class="form col-md-12 mb-5" name="form" action="{{route('dashboard/game/delete', ['id' => $game->id])}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-block">
                    Archivar
                </button>
            </form>
        </div>
    </div>

@endsection

<script>
    function showIframe() {
      event.preventDefault()
      const btnShow = document.getElementById('showButton')
      const divIframe = document.querySelector('iframe')
      console.log(divIframe);

      if (divIframe.classList.contains('d-none')) {
        divIframe.classList.remove('d-none')
      }
      divIframe.classList.add('d-block')

    }

    function hideIframe() {
      event.preventDefault()
      const btnShow = document.getElementById('hideButton')
      const divIframe = document.querySelector('iframe')

      divIframe.classList.remove('d-block')

      divIframe.classList.add('d-none')
    }


</script>