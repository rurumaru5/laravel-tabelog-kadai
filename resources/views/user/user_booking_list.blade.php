<!DOCTYPE html>
<html lang="ja">

<head>
  @include('user.css')

  <style>
    h1 {
      padding-top: 150px;
      text-align: center;
    }

    body {
      padding-top: px;
    }

    .search-bar {

      width: 70%;

    }

    .justify-content-between {
      padding: 10px;
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
    @include('user.nav')
  </header>
  <!-- ***** Header Area End ***** -->



  <h1>予約リスト</h1>
  <div class="container">
    <div class="row justify-content-center">

      <span>
        <a href="{{url('mypage') }}">戻る</a>
      </span>
      <div>
        <div class=" m-3" align="center">

          <table>

            <tr style="background-color:grey">

              <td style="padding: 20px;"> 店舗</td>
              <td style="padding: 20px;"> 予約日</td>
              <td style="padding: 20px;"> 予約時間</td>
              <td style="padding: 20px;"> 人数</td>
              <td style="padding: 20px;"></td>
              <td style="padding: 20px;"></td>
            </tr>




            @foreach($data as $book)

            <tr align="center" style="background-color: white;  border: 1px solid black;">
              <td>{{ $book->Shop->name}}</td>
              <td>{{ $book->book_date }}</td>
              <td>{{ $book->book_time }}</td>
              <td>{{ $book->number }}</td>
              <td>
                <a class="btn btn-primary" href="{{url('update_book',$book->id)}}"> 変更</a>
              </td>

              <td>

                <a class="btn btn-danger" href="{{url('delete_book',$book->id)}}" onclick='return confirm("本当に削除しますか？")'> キャンセル</a>


              </td>
            </tr>
            @endforeach

          </table>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!-- Scripts -->
  @include('user.script')

</body>

</html>