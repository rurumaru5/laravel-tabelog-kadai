<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <title>Lugx Gaming Shop HTML5 Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-lugx-gaming.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <!--

TemplateMo 589 lugx gaming

https://templatemo.com/tm-589-lugx-gaming

-->
</head>

<body>

  <div class="section most-played">
    <div class="container">
      <div class="row">
        <div class=>
          <div class="section-heading">
            <h2>店舗</h2>
            全店舗
            <a href="shops.html">全店舗<i class="fa fa-angle-right"></i></a>
            <div class="container">
              <div class=" main-button">
                <a href="">View All</a>
              </div>
            </div>
          </div>
        </div>



        @foreach($data as $shop)


        <div class="col-sm-4 ">
          <div class="item">
            <div class="thumb">
              <a href="shop-details.html">
                @if ($shop->image)

                <img src="images/{{$shop->image}}" alt="">
                @else
                <img src="{{ 'images/dummy.png'}}">
                @endif
              </a>
            </div>
            <div class="down-content">

              <span class="category">{{$shop->Category->name}}</span>
              <h2>{{$shop->name}}</h2>
              <h6>{{$shop->low_price}}円~{{$shop->high_price}}円</h6>
              <p>{{$shop->description}}</p>
              <a class="btn btn-primary" href="#">Explore</a>
            </div>
          </div>
        </div>
        @endforeach

        @if(method_exists($data,'links'))
        <div class="d-flex justify-content-center">

          {!! $data->links() !!}

        </div>
        @endif
      </div>
    </div>
  </div>
</body>