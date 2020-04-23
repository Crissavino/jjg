@extends('layouts.master')

@section('title', 'Bienvenido')

@section('main')
    <div class="row">
        <div class="col-sm-2 d-none d-sm-block publicity-left">
            <div class="publicity-block"></div>
            <div class="publicity-block"></div>
            <div class="publicity-block"></div>
            <div class="publicity-block"></div>
            <div class="publicity-block"></div>
        </div>

        <div class="col-8 games">
            @foreach ($games as $game)
                <div class="game-box bounceIn shadow p-0 mt-0">
                    <a href="{{route('game', ['id' => $game->id])}}">
                        <img loading="lazy" class="game-photo-m lazyload flex-fill" src="images/{{$game->title}}.png"
                             alt="">
                    </a>
                </div>
            @endforeach
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
  window.onload = () => {
    $(function() {
      $('.games > div').hover(
          function() {
            $(this).toggleClass('fadeIn')
          }).mouseout(function() {
        $(this).removeClass('fadeIn')
      });
    });
  };

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
