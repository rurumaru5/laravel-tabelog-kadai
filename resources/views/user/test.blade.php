<div class="section most-played">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="section-heading">
          <h6>TOP GAMES</h6>
          <h2>Most Played</h2>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="main-button">
          <a href="shop.html">View All</a>
        </div>
      </div>
      @foreach($data as $shop)
      <div class="col-sm-4 ">

        <div class="item">
          <div class="thumb">
            <a href="product-details.html">
              <img style="height: 200px; width:350px;" src="images/{{$shop->image}}">
            </a>
          </div>
          <div class="down-content">
            <span class="category">{{$shop->Category->name}}</span>
            <h4>{{$shop->name}}</h4>
            <h6>{{$shop->low_price}}円~{{$shop->high_price}}円</h6>
            <p>{!! Str::limit($shop->description,100)!!}</p>
            <a href="product-details.html">Explore</a>
          </div>
        </div>
      </div>
      @endforeach



    </div>
  </div>
</div>