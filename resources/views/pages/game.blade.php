@extends('layouts.master')

@section('title', $game->title)

@section('main')
    <div class="row">
      <h1 class="text-center" style="color: #7ddc95">{{ $game->title }}</h1>
    </div>
@endsection

<script>
  (async () => {
    if ('loading' in HTMLImageElement.prototype) {
      const images = document.querySelectorAll("img.lazyload");
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
