@extends('layouts.app')

@section('content')
<div class="container mt-3" style="max-width: 720px;">
  <div class="text-right">
    <a href="{{ url('/shop/') }}">＜ 戻る</a>
  </div>

  @if ( session('message') )
  <div class="alert alert-success" role="alert">{{ session('message') }}</div>
  @endif

  <form action="{{ route('shop.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group" style="margin-top: 30px; margin-bottom: 30px">
      <label for="name" class="font-weight-bold">店舗名</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" />
      @error('name')
      <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>

    <div class="form-group" style="margin-bottom: 30px">
      <label for="textarea" class="font-weight-bold">詳細</label>
      <textarea class="form-control @error('description') is-invalid @enderror" id="textarea" rows="5" name="description"></textarea>
      @error('description')
      <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>

    <div class="form-group" style="margin-bottom: 30px">
      <label for="low_price" class="font-weight-bold">最低価格</label>
      <input type="text" class="form-control @error('low_price') is-invalid @enderror" id="low_price" name="low_price" />
      <small class="form-text text-muted">半角数字で入力してください。</small>
      @error('low_price')
      <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>

    <div class="form-group" style="margin-bottom: 30px">
      <label for="high_price" class="font-weight-bold">最高価格</label>
      <input type="text" class="form-control @error('high_price') is-invalid @enderror" id="high_price" name="high_price" />
      <small class="form-text text-muted">半角数字で入力してください。</small>
      @error('high_price')
      <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>

    <div class="form-group" style="margin-top: 30px; margin-bottom: 30px">
      <label for="open" class="font-weight-bold">開店時間</label>
      <input type="time" class="form-control @error('open') is-invalid @enderror" id="open" name="open" />
      @error('open')
      <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>

    <div class="form-group" style="margin-top: 30px; margin-bottom: 30px">
      <label for="close" class="font-weight-bold">閉店時間</label>
      <input type="time" class="form-control @error('close') is-invalid @enderror" id="close" name="close" />
      @error('close')
      <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>

    <div class="form-group" style="margin-top: 30px; margin-bottom: 30px">
      <label for="postal" class="font-weight-bold">郵便番号</label>
      <input type="text" inputmode="numeric" class="form-control @error('postal') is-invalid @enderror" id="postal" name="postal" />
      <small class="form-text text-muted">半角数字で入力してください。</small>
      @error('postal')
      <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>

    <div class="form-group" style="margin-top: 30px; margin-bottom: 30px">
      <label for="address" class="font-weight-bold">住所</label>
      <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" />
      @error('address')
      <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>

    <div class="form-group" style="margin-top: 30px; margin-bottom: 30px">
      <label for="tell" class="font-weight-bold">電話番号</label>
      <input type="tell" class="form-control @error('tell') is-invalid @enderror" id="tell" name="tell" />
      @error('tell')
      <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>

    <div class="form-group" style="margin-top: 30px; margin-bottom: 30px">
      <label for="holiday" class="font-weight-bold">定休日</label>
      <input type="text" class="form-control @error('holiday') is-invalid @enderror" id="holiday" name="holiday" />
      @error('holiday')
      <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>

    <div class="form-group" style="margin-top: 30px; margin-bottom: 30px">
      <label for="map" class="font-weight-bold">MAP</label>
      <input type="text" class="form-control @error('map') is-invalid @enderror" id="map" name="map" />
      @error('map')
      <p class="text-danger">{{ $message }}</p>
      @enderror
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
        <a type="button" href="{{ url('/category/create/') }}" class="btn btn-outline-secondary py-1" role="button">新規追加</a>
        <a type="button" href="{{ url('/category/') }}" class="btn btn-outline-secondary py-1" role="button">編集</a>
      </div>
    </div>
    <div class="form-group" style="margin-bottom: 30px">
      <label for="image" class="font-weight-bold">画像アップロード</label>
      <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image" />
      @error('image')
      <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary my-3">送信</button>

  </form>
</div>
@endsection