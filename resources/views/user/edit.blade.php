<!DOCTYPE html>
<html lang="en">

<head>
  @include('user.css')
  <style>
    body {
      padding-top: 150px;
    }

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
    @include('home.header')
  </header>
  <!-- ***** Header Area End ***** -->
  <!-- main start -->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5">
        <span>
          <a href="{{url('mypage') }}">マイページ</a> > 会員情報の編集
        </span>

        <h1 class="mt-3 mb-3">会員情報の編集</h1>
        <hr>

        @if(session()->has('message'))

        <div class="alert alert-success">

          <button type="button" class="close" data-dismiss="alert">x</button>

          {{session()->get('message')}}

        </div>

        @endif

        <form method="POST" action="{{url('update_mypage') }}">
          @csrf
          <input type="hidden" name="_method" value="PUT">
          <div class="form-group">
            <div class="d-flex justify-content-between">
              <label for="name" class="text-md-left nagoyameshi-edit-user-info-label">氏名</label>
            </div>
            <input id="name" type="text" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus placeholder="侍 太郎">
          </div>
          <br>

          <div class="form-group">
            <div class="d-flex justify-content-between">
              <label for="email" class="text-md-left nagoyameshi-edit-user-info-label">メールアドレス</label>
            </div>
            <input id="email" type="text" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus placeholder="samurai@samurai.com">
          </div>
          <br>

          <div class="form-group">
            <div class="d-flex justify-content-between">
              <label for="email" class="text-md-left nagoyameshi-edit-user-info-label">郵便番号</label>
            </div>
            <input id="postal" type="text" name="postal" value="{{ $user->postal }}" required autocomplete="postal" autofocus placeholder="XXXXXXX">
          </div>
          <br>

          <div class="form-group">
            <div class="d-flex justify-content-between">
              <label for="address" class="text-md-left nagoyameshi-edit-user-info-label">住所</label>
            </div>
            <input id="address" type="text" name="address" value="{{ $user->address }}" required autocomplete="address" autofocus placeholder="XX県XX市XXXXXX">
          </div>
          <br>

          <div class="form-group">
            <div class="d-flex justify-content-between">
              <label for="tell" class="text-md-left nagoyameshi-edit-user-info-label">電話番号</label>
            </div>
            <input id="tell" type="text" name="tell" value="{{ $user->tell }}" required autocomplete="tell" autofocus placeholder="XXXXXXXXXXX">
          </div>


          <hr>
          <button type="submit" class="btn nagoyameshi-submit-button mt-3 w-25">
            保存
          </button>



        </form>
      </div>
    </div>
  </div>

  <!-- main end -->


  <!-- Scripts -->
  @include('home.script')

</body>

</html>