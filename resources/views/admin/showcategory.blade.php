<!DOCTYPE html>
<html lang="en">

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
            <form action="{{url('search_category')}}" method="get" class="row g-1">
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
              <td style="padding: 20px;"> #</td>
              <td style="padding: 20px;"> 作成日</td>
              <td style="padding: 20px;"> カテゴリー</td>
              <td style="padding: 20px;">編集</td>
              <td style="padding: 20px;">削除</td>
            </tr>




            @forelse($data as $category)

            <tr align="center" style="background-color: white;  border: 1px solid black;">
              <td>{{ $category->id}}</td>
              <td>{{ $category->created_at }}</td>
              <td>{{ $category->name }}</td>
              <td>
                <a class="btn btn-primary" href="{{url('updatecategoryview',$category->id)}}"> 編集</a>
              </td>

              <td>

                <a class="btn btn-danger" href="{{url('deletecategory',$category->id)}}"> 削除</a>


              </td>

            </tr>
            @empty
            <td>このカテゴリはありません</td>
            @endforelse

          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- partial -->
  @include('admin.script')
</body>

</html>