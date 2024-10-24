<!DOCTYPE html>
<html lang="en">

<head>
  @include('user.css')
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

  <div style="padding-top:200px;" class="container">
    <div class="container">
      <div class="row justify-content-center">

        <span>
          <a href="{{url('mypage') }}">戻る</a>
        </span>
        <form method="post" action="{{route('mypage.update_password')}}">
          @csrf
          <input type="hidden" name="_method" value="PUT">
          <div class="form-group row mb-3">
            <label for="password" class="col-md-3 col-form-label text-md-right">新しいパスワード</label>

            <div class="col-md-7">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="form-group row mb-3">
            <label for="password-confirm" class="col-md-3 col-form-label text-md-right">確認用</label>

            <div class="col-md-7">
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
          </div>

          <div class="form-group d-flex justify-content-center">
            <button type="submit" class="btn btn-danger w-25">
              パスワード更新
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>




  <!-- Scripts -->
  @include('user.script')

</body>

</html>