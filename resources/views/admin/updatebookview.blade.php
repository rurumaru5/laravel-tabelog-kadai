<!DOCTYPE html>
<html lang="ja">

<head>
  <base href="/public/admin">
  @include('home.css')

  <style type="text/css">
    .title {
      color: white;
      padding-top:
        25px;
      font-size: 25px;
    }

    label {
      display: inline-block;
      width: 200px;
    }
  </style>
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
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <div class="container" align="left">

          <!-- partial -->


          @if(session()->has('message'))

          <div class="alert alert-success">

            <button type="button" class="close" data-dismiss="alert">x</button>

            {{session()->get('message')}}

          </div>

          @endif

          <form action="{{url('updatebook',$book->id)}}" method="post" enctype="multipart/form-data">

            @csrf
            <div style="padding:15px;">
              <label>予約日</label>

              <input style="color: black;" type="date" name="name" value="{{$book->book_date}}" required="">
            </div>

            <div style="padding:15px;">
              <label>予約時間</label>

              <input style="color: black;" type="time" name="description" value="{{$book->book_time}}" required="">
            </div>

            <div style="padding:15px;">
              <label>予約人数</label>
              <select name="number" value="{{$book->number}}" required="">
                <option selected>人数</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
              </select>
            </div>

            <div style="padding:15px;">

              <input class="btn btn-success" type="submit">
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- partial -->
  @include('admin.script')
</body>

</html>