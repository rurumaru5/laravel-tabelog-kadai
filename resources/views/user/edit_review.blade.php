<!DOCTYPE html>
<html lang="en">

<head>

  <base href="/public/admin">
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
          <div class="offset-md-5 col-md-5">
            <form method="POST" action="{{ url('update_review') }}" enctype="multipart/form-data">

              @csrf
              <input type="hidden" name="shop_id" value="{{$shop_id}}">
              <input type="hidden" name="id" value="{{$id}}">

              <label for="categoryAdd" class="font-weight-bold">レビュー更新</label>

              <h4>評価</h4>
              <select name="score" class="form-control m-2 review-score-color">
                <option value="5" class="review-score-color">★★★★★</option>
                <option value="4" class="review-score-color">★★★★</option>
                <option value="3" class="review-score-color">★★★</option>
                <option value="2" class="review-score-color">★★</option>
                <option value="1" class="review-score-color">★</option>
              </select>
              <h4>レビュー内容</h4>

              <input class="form-control" name="comment" value="{{$review->comment}}">
              <input class="btn btn-success" type="submit">
            </form>


          </div>






        </div>
      </div>
    </div>
    @include('admin.script')
</body>

</html>