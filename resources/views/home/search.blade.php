<!DOCTYPE html>
<html lang="en">

<head>
  <base href="/public/">
  @include('home.css')

  <style type="text/css">
    label {
      display: inline-block;
      width: 200px
    }

    input {
      width: 100%;
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
    @include('home.header')
  </header>
  <!-- ***** Header Area End ***** -->



  <div class="main-banner">
    <div class="container">
      <div class="caption">
        @include('home.form')
      </div>
    </div>


    <div class="section most-played">


      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="section-heading">

              <h2>店舗</h2>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="main-button">

            </div>
            <div style="padding-bottom: 20px;">
              Sort By
              <td>@sortablelink('id', 'ID')</td>

              <td>@sortablelink('low_price', '価格')</td>
            </div>

          </div>


          @foreach($data as $shop)
          <div class="col-sm-4 ">

            <div class="item">
              <div class="thumb">
                <a href="{{url('shop_details',$shop->id)}}">
                  <img style="height: 200px; width:350px;" src="images/{{$shop->image}}">
                </a>
              </div>
              <div class="down-content">
                <span class="category">{{$shop->Category->name}}</span>
                <h4>{{$shop->name}}</h4>
                <h6>{{$shop->low_price}}円~{{$shop->high_price}}円</h6>
                <p>{!! Str::limit($shop->description,100)!!}</p>
                <a class="btn btn-primary" href="{{url('shop_details',$shop->id)}}">詳細</a>
              </div>
            </div>
          </div>
          @endforeach
          {{ $data->appends(request()->query())->links() }}
        </div>
      </div>
    </div>
  </div>
  <!-- Scripts -->
  @include('home.script')

</body>

</html>