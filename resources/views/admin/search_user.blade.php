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
            <form action="{{url('search_user')}}" method="get" class="row g-1">
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
              <td style="padding: 20px;"> 会員名</td>
              <td style="padding: 20px;">削除</td>
            </tr>




            @forelse($users as $user)

            <tr align="center" style="background-color: white;  border: 1px solid black;">
              <td>{{ $user->id}}</td>
              <td>{{ $user->created_at }}</td>
              <td>{{ $user->name }}</td>


              <td>
                <a class="btn btn-danger" href="{{url('deleteuser',$user->id)}}"> 削除</a>
              </td>

            </tr>
            @empty
            <td>この会員はいません</td>
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