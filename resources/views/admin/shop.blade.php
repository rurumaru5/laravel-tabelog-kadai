<!DOCTYPE html>
<html lang="ja">

<head>
  @include('home.css')

</head>


<body>
  <div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    @include('admin.sidebar')
    <!-- Page content wrapper-->
    <div id="page-content-wrapper">
      <!-- Top navigation-->
      @include('admin.header')
      <!-- Page content-->

      <!-- partial -->

      <div class="container-fluid">

        <div align="left">
          <h1 class="title">新規店舗</h1>

          @if(session()->has('message'))

          <div class="alert alert-success">

            <button type="button" class="close" data-dismiss="alert">x</button>

            {{session()->get('message')}}

          </div>

          @endif

          <form action="{{url('uploadshop')}}" method="post" enctype="multipart/form-data">

            @csrf
            <div style="padding:15px;">
              <label>店舗名</label>

              <input style="color: black;" type="text" name="name" placeholder="店舗名を記入してください" required="">
            </div>

            <div style="padding:15px;">
              <label>詳細</label>

              <input style="color: black;" type="text" name="description" placeholder="詳細を記入してください" required="">
            </div>

            <div style="padding:15px;">
              <label>最低価格</label>

              <input style="color: black;" type="number" name="low_price" placeholder="価格を記入してください" required="">
            </div>

            <div style="padding:15px;">
              <label>最高価格</label>

              <input style="color: black;" type="number" name="high_price" placeholder="価格を記入してください" required="">
            </div>

            <div style="padding:15px;">
              <label>開店時間</label>

              <input style="color: black;" type="time" name="open" required="">
            </div>


            <div style="padding:15px;">
              <label>閉店時間</label>

              <input style="color: black;" type="time" name="close" required="">
            </div>



            <div style="padding:15px;">
              <label>郵便番号</label>

              <input style="color: black;" type="number" name="postal" placeholder="郵便番号を記入してください" required="">
            </div>

            <div style="padding:15px;">
              <label>住所</label>

              <input style="color: black;" type="text" name="address" placeholder="住所を記入してください" required="">
            </div>

            <div style="padding:15px;">
              <label>電話番号</label>

              <input style="color: black;" type="tel" name="tell" placeholder="電話番号を記入してください" required="">
            </div>

            <div style="padding:15px;">
              <label>定休日</label>

              <input style="color: black;" type="text" name="holiday" placeholder="定休日を記入してください" required="">
            </div>

            <div style="padding:15px;">
              <label>地図</label>

              <input style="color: black;" type="text" name="map" placeholder="URLを記入してください" required="">
            </div>

            <div class="form-group" style="margin-bottom: 30px">
              <label for="category" class="font-weight-bold">カテゴリー</label>
              <select class="form-control @error('category') is-invalid @enderror" id="category" name="category">
                <option value="" disabled selected style="display: none;">カテゴリーを選択してください。</option>
                @foreach(App\Models\Category::all() as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
              @error('category')
              <p class="text-danger">{{ $message }}</p>
              @enderror
              <div class="text-right mt-2">
                <a type="button" href="{{ url('/category') }}" class="btn btn-outline-secondary py-1" role="button">新規追加</a>
                <a type="button" href="{{ url('/showcategory') }}" class="btn btn-outline-secondary py-1" role="button">編集</a>
              </div>

              <div style="padding:15px;">
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
  </div>


  <!-- partial -->
  @include('admin.script')
</body>

</html>