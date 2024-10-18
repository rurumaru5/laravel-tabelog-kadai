@extends('layouts.app')

@section('content')
<div class="container mt-3" style="max-width: 720px;">
  <div class="text-right">
    <a href="{{ url('/shop/create') }}">
      < 戻る</a>
  </div>

  <form action="{{ route('category.update', [ 'category' => $category->id ]) }}" method="POST"> <!--変更-->
    @csrf
    @method('PUT') <!--追記-->
    <div class="form-group">
      <label for="categoryAdd" class="font-weight-bold">カテゴリー編集</label> <!--変更-->
      <input type="text" class="form-control" id="categoryAdd" name="name" value="{{ $category->name }}" /> <!--変更-->
    </div>
    <button type="submit" class="btn btn-primary">編集</button> <!--変更-->
    @error('name') <!--追記-->
    <p class="text-danger">{{ $message }}</p> <!--追記-->
    @enderror <!--追記-->
  </form>

  <div class="my-4">
    <a href="{{ url('/category/') }}">> 一覧ページへ</a> <!--変更-->
  </div>
</div>
@endsection