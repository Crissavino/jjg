@extends('layouts.master')

@section('title', $game->title)

@section('main')

    <div class="row">
        <div class="col-sm-2 d-none d-sm-block publicity-left">
            <div class="publicity-block"></div>
            <div class="publicity-block"></div>
            <div class="publicity-block"></div>
            <div class="publicity-block"></div>
            <div class="publicity-block"></div>
        </div>

        <div class="col-8">
            <h1 class="text-center d-block game-title">{{ $game->title }}</h1>
            <div class="text-center d-block">
                @foreach ($game->tags as $tag)
                    <a href="#" class="badge badge-primary d-inline-block">{{$tag->title}}</a>
                @endforeach
            </div>

            <div class="col-10 m-auto">
              <div class="iframe-container d-block mt-5 p-4 m-auto">
                {!! $game->iframe !!}
              </div>

              <div class="game-description d-block mt-2">
                <h3 class="text-center">Instrucciones del juego</h3>
                <p class="game-text">
                  {{ $game->instruction }}
                </p>
              </div>

              <div class="game-description d-block mt-2 ">
                <h3 class="text-center">Descripcion del juego</h3>
                <p class="game-text">
                  {{ $game->description }}
                </p>
              </div>
            </div>

        </div>

        <div class="col-sm-2 col-4 publicity-right">
            <div class="publicity-block"></div>
            <div class="publicity-block"></div>
            <div class="publicity-block"></div>
            <div class="publicity-block"></div>
            <div class="publicity-block"></div>
        </div>
    </div>
@endsection

<script>
  (async () => {
    if ('loading' in HTMLImageElement.prototype) {
      const images = document.querySelectorAll('img.lazyload');
      images.forEach(img => {
        img.src = img.dataset.src;
      });
    } else {
      // Dynamically import the LazySizes library
      const lazySizesLib = await import('/lazysizes.min.js');
      // Initiate LazySizes (reads data-src & class=lazyload)
      lazySizes.init(); // lazySizes works off a global.
    }
  })();
</script>
