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

    .favorite_button {
      margin-top: 50px;
    }
  </style>
</head>

<body>
  <!-- ***** Preloader Start ***** -->

  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    @include('home.header')
  </header>
  <!-- ***** Header Area End ***** -->
  <div class="section most-played">
    <div class="container">
      <div class="row">
        <div class="section-heading">
          @if(session()->has('message'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{session()->get('message')}}
          </div>
          @endif
          <h2>店舗</h2>
          <div class="text-right">
            <a href="{{ url('/') }}">＜ 戻る</a>
          </div>
        </div>
        @auth
        <!-- お気に入りボタン -->
        <div class="row justify-content-left">
          @if($favorite)
          <div class="col-md-3">
            <!-- 有料会員（statusが1の場合）のとき処理(お気に入りの登録解除)が実行されるようにしたい-->
            @if($user->status == '1')
            <form action="{{url('unfavorite',$shop->id)}}" method="post">
              @csrf
              <input type="submit" value="お気に入り解除" class="btn btn-danger">
            </form>
            @else
            <form action="{{url('member')}}" method="get">
              @csrf
              <input type="submit" value="お気に入り解除" class="btn btn-danger">
            </form>
            @endif
          </div>
          @else
          <div class="col-md-3">
            <!-- ここも上と同じようにする -->
            @if($user->status == '1')
            <form action="{{url('favorite',$shop->id)}}" method="post">
              @csrf
              <input type="submit" value="お気に入り登録" class="btn btn-success">
            </form>
            @else
            <form action="{{url('member')}}" method="get">
              @csrf
              <input type="submit" value="お気に入り登録" class="btn btn-success">
            </form>
            @endif
          </div>
          @endif
        </div>
        @endauth
        <!-- ここまでお気に入りボタン -->
        <div class="row">
          <div class="col-md-8 ">
            <div class="item">
              <div style="padding: 20px;" class="thumb">
                <img style="height: 300px; width:800px;" src="{{asset('images/'.$shop->image)}}">
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
          @auth
          <div class="col-md-4">
            <h2 style="font-size: 30px!important;">店舗予約</h2>
            @if($errors)
            @foreach($errors->all() as $errors)
            <li style="color:red;">
              {{$errors}}
            </li>
            @endforeach
            @endif

            @if($user->status == '1')
            <form action="{{url('add_booking',$shop->id)}}" method="Post">
              @csrf
              <input type="hidden" name="user_id" value="{{$user_id}}">
              <div>
                <label>予約日</label>
                <input type="date" name="book_date" id="book_date" required="">
              </div>
              <div>
                <label>予約時間</label>
                <input type="time" name="book_time" required="">
              </div>
              <div>
                <label>予約人数</label>
                <select class="form-select" name="number" required="">
                  <option selected>人数</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select>
              </div>
              <div style="padding-top: 20px;">
                <input type="submit" class="btn btn-primary" value="予約">
              </div>
            </form>
            @else
            <form action="{{url('member')}}" method="get">
              @csrf
              <input type="hidden" name="user_id" value="{{$user_id}}">
              <div>
                <label>予約日</label>
                <input type="date" name="book_date" id="book_date" required="">
              </div>
              <div>
                <label>予約時間</label>
                <input type="time" name="book_time" required="">
              </div>
              <div>
                <label>予約人数</label>
                <select class="form-select" name="number" required="">
                  <option selected>人数</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select>
              </div>
              <div style="padding-top: 20px;">
                <input type="submit" class="btn btn-primary" value="予約">
              </div>
            </form>
            @endif
          </div>
          @endauth
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