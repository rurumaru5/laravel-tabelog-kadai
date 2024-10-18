<!DOCTYPE html>
<html lang="en">

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
          <h1 style="color: black;" class="title">更新店舗</h1>

          @if(session()->has('message'))

          <div class="alert alert-success">

            <button type="button" class="close" data-dismiss="alert">x</button>

            {{session()->get('message')}}

          </div>

          @endif

          <form action="{{url('updateshop',$data->id)}}" method="post" enctype="multipart/form-data">

            @csrf
            <div style="padding:15px;">
              <label>店舗名</label>

              <input style="color: black;" type="text" name="name" value="{{$data->name}}" required="">
            </div>

            <div style="padding:15px;">
              <label>詳細</label>

              <input style="color: black;" type="text" name="description" value="{{$data->description}}" required="">
            </div>

            <div style="padding:15px;">
              <label>最低価格</label>

              <input style="color: black;" type="number" name="low_price" value="{{$data->low_price}}" required="">
            </div>

            <div style="padding:15px;">
              <label>最高価格</label>

              <input style="color: black;" type="number" name="high_price" value="{{$data->high_price}}" required="">
            </div>

            <div style="padding:15px;">
              <label>開店時間</label>

              <input style="color: black;" type="time" name="open" value="{{$data->open}}" required="">
            </div>


            <div style="padding:15px;">
              <label>閉店時間</label>

              <input style="color: black;" type="time" name="close" value="{{$data->close}}" required="">
            </div>

            <div style="padding:15px;">
              <label>郵便番号</label>

              <input style="color: black;" type="number" name="postal" value="{{$data->postal}}" required="">
            </div>

            <div style="padding:15px;">
              <label>住所</label>

              <input style="color: black;" type="text" name="address" value="{{$data->address}}" required="">
            </div>

            <div style="padding:15px;">
              <label>電話番号</label>

              <input style="color: black;" type="tel" name="tell" value="{{$data->tell}}" required="">
            </div>

            <div style="padding:15px;">
              <label>定休日</label>

              <input style="color: black;" type="text" name="holiday" value="{{$data->holiday}}" required="">
            </div>

            <div style="padding:15px;">
              <label>地図</label>

              <input style="color: black;" type="text" name="map" value="{{$data->map}}" required="">
            </div>

            <div style="padding:15px;">
              <label for="category" class>カテゴリー</label>
              <select class="form-control @error('category') is-invalid @enderror" id="category" name="category">
                <option value="" disabled selected style="display: none;">カテゴリーを選択してください。</option>

                @foreach(App\Models\Category::all() as $category)
                <option value="{{ $category->id }}" @foreach($data as $shop) @if($category->id == $data->category_id) selected @endif>{{ $category->name }}</option>
                @endforeach
                @endforeach
              </select>
              @error('category')
              <p class="text-danger">{{ $message }}</p>
              @enderror
              <div class="text-right mt-2">
                <a type="button" href="{{ url('category') }}" class="btn btn-outline-secondary py-1" role="button">新規追加</a>
                <a type="button" href="{{ url('updatecategoryview') }}" class="btn btn-outline-secondary py-1" role="button">編集</a>
              </div>

              <div style="padding:15px;">
                <label>今までの写真</label>

                <img height="100" width="100" src="images/{{$data->image}}">
              </div>

              <div style="padding:15px;">

                <label>画像の変更</label>
                <input type="file" name="image">
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