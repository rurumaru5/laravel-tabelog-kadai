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



  <h1>お気に入りリスト</h1>

  <div class=" m-3" align="center">
    <table>

      <tr style="background-color:grey">

        <td style="padding: 20px;"> 店舗</td>
        <td style="padding: 20px;"></td>
        <td style="padding: 20px;"></td>
      </tr>
      @foreach($shops as $shop)
      <tr align="center" style="background-color: white;  border: 1px solid black;">
        <td>{{ $shop->name}}</td>
        <td>
          <form id="unfavorite" action="{{url('unfavorite',$shop->id)}}" method="post">
            @csrf
            <input type="submit" value="お気に入り解除" class="btn btn-danger">
          </form>
        </td>
      </tr>
      @endforeach

    </table>
  </div>


  <!-- Scripts -->
  @include('user.script')
  <script>
    $(function() {
      $("#unfavorite").submit(function() {
        if (!confirm('削除してよろしいですか？')) {
          return false;
        }
      });
    });
  </script>

</body>

</html>