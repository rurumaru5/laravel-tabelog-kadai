<!DOCTYPE html>
<html lang="en">

<head>

  @include('home.css')

  <style>
    tr {
      border: 3px solid white;
    }

    td {
      padding: 10px;
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

      <div style="padding-bottom: 30px;" class="container-fluid page-body-wrapper">
        <div class="container" align="center">
          @if(session()->has('message'))

          <div class="alert alert-success">

            <button type="button" class="close" data-dismiss="alert">x</button>

            {{session()->get('message')}}

          </div>

          @endif




          <table>
            <tr style="background-color:grey">

              <th style="padding: 20px;">画像</th>
              <th style="padding: 20px;">店舗名</th>
              <th style="padding: 20px;">詳細</th>
              <th style="padding: 20px;">カテゴリー</th>
              <th style="padding: 20px;">価格帯</th>
              <th style="padding: 20px;">更新</th>
              <th style="padding: 20px;">削除</th>



            </tr>

            @foreach($shops as $shop)
            <tr align="center" style="background-color: white; border: 1px solid black; ">

              <td style="max-width: 200px;">
                <img height="200px" width="200px" src="images/{{$shop->image}}">
              </td>
              <td>{{$shop->name}}</td>
              <td>{{$shop->description}}</td>
              <td>{{$shop->Category->name}}</td>
              <td>{{$shop->low_price}}円~{{$shop->high_price}}円</td>

              <td>
                <a class="btn btn-primary" href="{{url('updateview',$shop->id)}}"> 編集</a>
              </td>

              <td>

                <a onclick="return confirm('本当に削除しますか？');" class="btn btn-danger" href="{{url('deleteshop',$shop->id)}}"> 削除</a>


              </td>


            </tr>

            @endforeach

          </table>

        </div>
      </div>
    </div>
  </div>

  <!-- partial -->
  @include('admin.script')
</body>

</html>