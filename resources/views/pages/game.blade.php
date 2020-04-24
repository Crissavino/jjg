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

                <div class="game-description d-block mt-3 mb-3">
                    <h3 class="title-h3" style="">Instrucciones del juego</h3>
                    <p class="game-text mt-3">
                        {{ $game->instruction }}
                    </p>
                </div>

                <div class="game-description d-block mt-2 mb-3">
                    <h3 class="title-h3">Descripcion del juego</h3>
                    <p class="game-text mt-3">
                        {{ $game->description }}
                    </p>
                </div>

                <div class="related-games mt-5">
                    <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
                        <div class="MultiCarousel-inner games">
                            @foreach ($relatedGames as $relatedGame)
                                <div class="item">
                                    <div class="game-box">
                                        <a href="{{route('game', ['id' => $relatedGame->id])}}">
                                            <img loading="lazy" class="lazyload flex-fill" src="{{asset('images/'.$relatedGame->title.'.png')}}"
                                                 alt="">
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button class="btn btn-primary leftLst"><</button>
                        <button class="btn btn-primary rightLst">></button>
                    </div>
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
  window.onload = () => {
    $(function() {
      $('.games > div').hover(
          function() {
            $(this).toggleClass('fadeIn')
          }).mouseout(function() {
        $(this).removeClass('fadeIn')
      });
    });

    var itemsMainDiv = ('.MultiCarousel');
    var itemsDiv = ('.MultiCarousel-inner');
    var itemWidth = "";

    $('.leftLst, .rightLst').click(function () {
      var condition = $(this).hasClass("leftLst");
      if (condition)
        click(0, this);
      else
        click(1, this)
    });

    ResCarouselSize();




    $(window).resize(function () {
      ResCarouselSize();
    });

    //this function define the size of the items
    function ResCarouselSize() {
      var incno = 0;
      var dataItems = ("data-items");
      var itemClass = ('.item');
      var id = 0;
      var btnParentSb = '';
      var itemsSplit = '';
      var sampwidth = $(itemsMainDiv).width();
      var bodyWidth = $('body').width();
      $(itemsDiv).each(function () {
        id = id + 1;
        var itemNumbers = $(this).find(itemClass).length;
        btnParentSb = $(this).parent().attr(dataItems);
        itemsSplit = btnParentSb.split(',');
        $(this).parent().attr("id", "MultiCarousel" + id);


        if (bodyWidth >= 1200) {
          incno = itemsSplit[3];
          itemWidth = sampwidth / incno;
        }
        else if (bodyWidth >= 992) {
          incno = itemsSplit[2];
          itemWidth = sampwidth / incno;
        }
        else if (bodyWidth >= 768) {
          incno = itemsSplit[1];
          itemWidth = sampwidth / incno;
        }
        else {
          incno = itemsSplit[0];
          itemWidth = sampwidth / incno;
        }
        $(this).css({ 'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers });
        $(this).find(itemClass).each(function () {
          $(this).outerWidth(itemWidth);
        });

        $(".leftLst").addClass("over");
        $(".rightLst").removeClass("over");

      });
    }


    //this function used to move the items
    function ResCarousel(e, el, s) {
      var leftBtn = ('.leftLst');
      var rightBtn = ('.rightLst');
      var translateXval = '';
      var divStyle = $(el + ' ' + itemsDiv).css('transform');
      var values = divStyle.match(/-?[\d\.]+/g);
      var xds = Math.abs(values[4]);
      if (e == 0) {
        translateXval = parseInt(xds) - parseInt(itemWidth * s);
        $(el + ' ' + rightBtn).removeClass("over");

        if (translateXval <= itemWidth / 2) {
          translateXval = 0;
          $(el + ' ' + leftBtn).addClass("over");
        }
      }
      else if (e == 1) {
        var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
        translateXval = parseInt(xds) + parseInt(itemWidth * s);
        $(el + ' ' + leftBtn).removeClass("over");

        if (translateXval >= itemsCondition - itemWidth / 2) {
          translateXval = itemsCondition;
          $(el + ' ' + rightBtn).addClass("over");
        }
      }
      $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
    }

    //It is used to get some elements from btn
    function click(ell, ee) {
      var Parent = "#" + $(ee).parent().attr("id");
      var slide = $(Parent).attr("data-slide");
      ResCarousel(ell, Parent, slide);
    }


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
