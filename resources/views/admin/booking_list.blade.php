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


      <!-- partial -->



      <div style="padding-bottom: 30px; " class="container-fluid page-body-wrapper">
        <div class="container" align="center">
          @if(session()->has('message'))

          <div class="alert alert-success">

            <button type="button" class="close" data-dismiss="alert">x</button>

            {{session()->get('message')}}

          </div>

          @endif

          <div>
            <form action="{{url('search_book')}}" method="get" class="row g-1">
              <div class="col-auto">
                <input type="text" name="keyword" class="form-control nagoyameshi-header-search-input">
              </div>
              <div style="padding: 5px;" class="col-auto">
                <button type="submit" class="btn nagoyameshi-header-search-button"><i class="fas fa-search nagoyameshi-header-search-icon"></i></button>
              </div>
            </form>
          </div>

          <table>

            <tr style="background-color:grey">
              <td style="padding: 20px;"> 予約者</td>
              <td style="padding: 20px;"> 店舗</td>
              <td style="padding: 20px;"> 予約日</td>
              <td style="padding: 20px;"> 予約時間</td>
              <td style="padding: 20px;"> 人数</td>
              <td style="padding: 20px;">編集</td>
              <td style="padding: 20px;">削除</td>
            </tr>




            @foreach($data as $book)

            <tr align="center" style="background-color: white;  border: 1px solid black;">
              <td>{{ $book->User->name}}</td>
              <td>{{ $book->Shop->name}}</td>
              <td>{{ $book->book_date }}</td>
              <td>{{ $book->book_time }}</td>
              <td>{{ $book->number }}</td>
              <td>
                <a class="btn btn-primary" href="{{url('updatebookview',$book->id)}}"> 編集</a>
              </td>

              <td>

                <a class="btn btn-danger" href="{{url('deletebookview',$book->id)}}" onclick='return confirm("本当に削除しますか？")'> 削除</a>


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