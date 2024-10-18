<!DOCTYPE html>
<html lang="en">

<head>
  @include('user.css')
  <style>
    body {
      padding-top: 50px;
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

  <div class="d-flex" id="wrapper">
    <!-- Sidebar--> <!-- Page content wrapper-->
    <div id="page-content-wrapper">
      <!-- Top navigation-->
      @include('admin.header')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <div class="container">

          <main class="py-4 mb-5">

            <div class="d-flex justify-content-center">

              <div class="container w-50">
                <div class="text-right">
                  <a href="{{ url('mypage') }}">＜ 戻る</a>
                </div>
                @if (!empty($card))
                <h3>登録済みのクレジットカード</h3>

                <hr>
                <h4>{{ $card["brand"] }}</h4>
                <p>有効期限: {{ $card["exp_year"] }}/{{ $card["exp_month"] }}</p>
                <p>カード番号: ************{{ $card["last4"] }}</p>
                @endif

                <form action="{{ url('token') }}" method="post">
                  @csrf
                  @if (empty($card))
                  <script type="text/javascript" src="https://checkout.pay.jp/" class="payjp-button" data-key="{{ ENV('PAYJP_PUBLIC_KEY') }}" data-on-created="onCreated" data-text="カードを登録する" data-submit-text="カードを登録する"></script>
                  @else
                  <script type="text/javascript" src="https://checkout.pay.jp/" class="payjp-button" data-key="{{ ENV('PAYJP_PUBLIC_KEY') }}" data-on-created="onCreated" data-text="カードを更新する" data-submit-text="カードを更新する"></script>
                  @endif
                </form>
                <!--削除ボタン ここから追加 -->
                <form method="post" action="{{url('delete_card')}}">

                  @csrf

                  <button type="submit" class="btn btn-danger">
                    削除
                  </button>
                </form>
                <!-- ここまで -->
              </div>
            </div>
          </main>
        </div>
      </div>
    </div>
  </div>





  <!-- Scripts -->
  @include('home.script')

</body>

</html>