<!DOCTYPE html>
<html lang="en">

<head>
  @include('home.css')
  <style>
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
    @include('admin.header')
  </header>
  <!-- ***** Header Area End ***** -->
  <!-- section1 start -->
  @include('home.section1')

  <!-- section1 end -->



  <!-- section2 start -->
  @include('home.section2')
  <!-- section2 end -->




  <!-- Scripts -->
  @include('home.script')

</body>

</html>