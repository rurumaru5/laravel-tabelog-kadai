<!DOCTYPE html>
<html lang="en">

<head>

  @include('home.css')

  <style type="text/css">
    .category {
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
      <div class="container-fluid page-body-wrapper">
        <div class="container" align="left">
          <h1 class="category">カテゴリー</h1>

          @if(session()->has('message'))

          <div class="alert alert-success">

            <button type="button" class="close" data-dismiss="alert">x</button>

            {{session()->get('message')}}

          </div>

          @endif
          <div class="container mt-3" style="max-width: 720px;">
            <div class="text-right">
              <a href="{{ url('/shop/create') }}">＜ 戻る</a>
            </div>

            <form action="{{url('uploadcategory')}}" method="post">
              @csrf
              <div class="form-group">
                <label for="categoryAdd" class="font-weight-bold">新規カテゴリー追加</label>
                <input style="color: white;" type="text" class="form-control" id="categoryAdd" name="name" />
              </div>
              <button type="submit" class="btn btn-primary">追加</button>
            </form>

            <div class="my-4">
              <a href="{{ url('/showcategory/') }}">＞ 一覧・編集ページへ</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- partial -->
  @include('admin.script')
</body>

</html>