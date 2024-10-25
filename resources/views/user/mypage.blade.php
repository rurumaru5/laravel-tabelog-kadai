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

  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->

  @include('admin.header')

  <!-- ***** Header Area End ***** -->
  @include('user.content')




  <!-- Scripts -->
  @include('home.script')

</body>

</html>