<x-app-layout>


  <div class="d-flex justify-content-center">
    <div class="row w-75">
      <div class="col-5 offset-1">
        <img src="{{ asset('img/dummy.png')}}" class="w-100 img-fluid">
      </div>
      <div class="col">
        <div class="d-flex flex-column">
          <h1 class="">
            {{$shop->name}}
          </h1>
          <p class="">
            {{$shop->description}}
          </p>
          <hr>
          <p class="d-flex align-items-end">
            ￥{{$shop->low_price}}(税込)
          </p>
          <hr>
        </div>
        @auth
        <form method="POST" class="m-3 align-items-end">
          @csrf
          <input type="hidden" name="id" value="{{$shop->id}}">
          <input type="hidden" name="name" value="{{$shop->name}}">
          <input type="hidden" name="price" value="{{$shop->price}}">
          <div class="form-group row">
            <label for="quantity" class="col-sm-2 col-form-label">数量</label>
            <div class="col-sm-10">
              <input type="number" id="quantity" name="qty" min="1" value="1" class="form-control w-25">
            </div>
          </div>


        </form>
        @endauth
      </div>

      <div class="offset-1 col-11">
        <hr class="w-100">
        <h3 class="float-left">カスタマーレビュー</h3>
      </div>

      <div class="offset-1 col-10">
        <!-- レビューを実装する箇所になります -->
      </div>
    </div>
  </div>
</x-app-layout>