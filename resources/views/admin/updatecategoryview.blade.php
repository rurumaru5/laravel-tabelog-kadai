<!DOCTYPE html>
<html lang="en">

<head>

  <base href="/public/admin">
  @include('admin.css')

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


          @if(session()->has('message'))

          <div class="alert alert-success">

            <button type="button" class="close" data-dismiss="alert">x</button>

            {{session()->get('message')}}

          </div>

          @endif
          <div class="container mt-3" style="max-width: 720px;">
            <div class="text-right">
              <a href="{{ url('showcategory') }}">＜ 戻る</a>
            </div>

            <form action="{{url('updatecategory',$category->id)}}" method="post" enctype="multipart/form-data">

              @csrf

              <div class="form-group">
                <label for="categoryAdd" class="font-weight-bold">カテゴリ更新</label>


                <input class="form-control" name="category_name" value="{{ $category->name }}" />




              </div>

              <input class="btn btn-success" type="submit">
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