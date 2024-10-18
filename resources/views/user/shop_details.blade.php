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
            <a href="shop.html">View All</a>
          </div>
        </div>
        <div class="row">



          <div class="col-md-8 ">

            <div class="item">
              <div style="padding: 20px;" class="thumb">
                <a href="product-details.html">
                  <img style="height: 300px; width:800px;" src="images/{{$shop->image}}">
                </a>
              </div>
              <div class="down-content">
                <span class="category"></span>
                <h2>{{$shop->name}}</h2>
                <p style="padding: 12px">{{$shop->description}}</p>
              </div>
              <h4 style="padding: 12px">価格:{{$shop->low_price}}円～{{$shop->high_price}}円</h4>
              <h4 style="padding: 12px">時間{{$shop->open}}～{{$shop->close}}円</h4>
              <h4 style="padding: 12px">定休日:{{$shop->holiday}}</h4>
              <h4 style="padding: 12px">住所:{{$shop->address}}</h4>


            </div>
          </div>
          <div class="col-md-4">

            <h1 style="font-size: 40px!important;">店舗予約</h1>

            @if($errors)

            @foreach($errors->all() as $errors)
            <li style="color:red;">
              {{$errors}}
            </li>
            @endforeach

            @endif


            <form action="{{url('add_booking',$shop->id)}}" method="Post">
              @csrf
              <div>
                <label>予約日</label>
                <input type="date" name="book_date" id="book_date">
              </div>
              <div>
                <label>予約時間</label>
                <input type="time" name="book_time">
              </div>
              <div>
                <label>予約人数</label>
                <input type="number" name="number">
              </div>
              <div style="padding-top: 20px;">

                <input type="submit" class="btn btn-primary" value="予約">
              </div>
            </form>
          </div>

          <div>
            @include('home.review')
          </div>


        </div>




      </div>
    </div>
  </div>





  <!-- Scripts -->
  @include('home.script')
  <script type="text/javascript">
    $(function() {
      var dtToday = new Date();
      var month = dtToday.getMonth() + 1;
      var day = dtToday.getDate();
      var year = dtToday.getFullYear();
      if (month < 10)
        month = '0' + month.toString();
      if (day < 10)
        day = '0' + day.toString();
      var maxDate = year + '-' + month + '-' + day;
      $('#book_date').attr('min', maxDate);
    });
  </script>

</body>

</html>