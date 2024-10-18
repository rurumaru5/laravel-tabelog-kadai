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

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    @include('home.header')
  </header>
  <!-- ***** Header Area End ***** -->
  @include('user.content')




  <!-- Scripts -->
  @include('home.script')

</body>

</html>