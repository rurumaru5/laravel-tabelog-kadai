<!DOCTYPE html>
<html lang="ja">

<head>

  @include('home.css')

</head>

<body>

  <!-- partial -->
  <div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    @include('admin.sidebar')
    <!-- Page content wrapper-->
    <div id="page-content-wrapper">
      <!-- Top navigation-->
      @include('admin.header')
    </div>
  </div>
  <!-- partial -->


  <!-- partial -->
  @include('admin.script')
</body>

</html>