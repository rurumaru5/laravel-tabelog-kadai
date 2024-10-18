<!DOCTYPE html>
<html lang="en">

<head>
  @include('home.css')
  <style>
    .search-bar {

      width: 70%;

    }
  </style>
</head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    @include('admin.header')
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="container  d-flex justify-content-center mt-3">
    <div class="w-75">
      <h1>お気に入り</h1>

      <hr>

      <div class="row">
        @foreach ($favorites as $fav)
        <div class="col-md-7 mt-2">
          <div class="d-inline-flex">
            <a href="{{url('shop_details', $fav->favoriteable_id)}}" class="w-25">
              <img src="{{ asset('img/dummy.png')}}" class="img-fluid w-100">
            </a>
            <div class="container mt-3">
              <h5 class="w-100 nagoyameshi-favorite-item-text">{{App\Models\shop::find($fav->favoriteable_id)->name}}</h5>
              <h6 class="w-100 nagoyameshi-favorite-item-text">&yen;{{App\Models\shop::find($fav->favoriteable_id)->low_price}}</h6>
            </div>
          </div>
        </div>
        <div class="col-md-2 d-flex align-items-center justify-content-end">
          <a href="{{ url('shops.favorite', $fav->favoriteable_id) }}" class="nagoyameshi-favorite-item-delete">
            削除
          </a>
        </div>

        @endforeach
      </div>

      <hr>
    </div>
  </div>





  <!-- Scripts -->
  @include('home.script')

</body>

</html>