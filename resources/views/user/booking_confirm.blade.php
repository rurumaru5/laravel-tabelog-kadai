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
    @include('user.nav')
  </header>
  <!-- ***** Header Area End ***** -->





  <!-- Scripts -->
  @include('user.script')

</body>

</html>