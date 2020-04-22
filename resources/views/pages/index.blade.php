@extends('layouts.master')

@section('title', 'Bienvenido')

@section('main')
    <div class="row">
        <div class="col-8 games" style="width: 100%">
            @foreach ($games as $game)
                <div class="game-box bounceIn shadow p-0 mt-0">
                    <a href="{{route('game', ['id' => $game->id])}}">
                        <img loading="lazy" class="game-photo-m lazyload flex-fill" src="images/{{$game->title}}.png"
                             alt="">
                    </a>
                </div>
            @endforeach
        </div>

        <div class="col-4 publicity">
            <div class="publicity-block">
            </div>

            <div class="publicity-block">
            </div>

            <div class="publicity-block">
            </div>

            <div class="publicity-block">
            </div>

            <div class="publicity-block">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 games" style="width: 100%">
            @foreach ($firstTwelveGames as $game)
                <div class="game-box-twelve bounceIn shadow p-0 mt-0">
                    <a href="{{route('game', ['id' => $game->id])}}">
                        <img loading="lazy" class="game-photo-m lazyload flex-fill" src="images/{{$game->title}}.png"
                             alt="">
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <div class="row">
        <div class="col-12 games" style="width: 100%">
            @foreach ($secondTwelveGames as $game)
                <div class="game-box-twelve bounceIn shadow p-0 mt-0">
                    <a href="{{route('game', ['id' => $game->id])}}">
                        <img loading="lazy" class="game-photo-m lazyload flex-fill" src="images/{{$game->title}}.png"
                             alt="">
                    </a>
                </div>
            @endforeach
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
