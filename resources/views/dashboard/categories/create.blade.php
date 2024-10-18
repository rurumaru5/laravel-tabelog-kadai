<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('カテゴリ') }}
    </h2>
    <div class="space-x-4">
      <!-- index -->
      <x-nav-link href="{{ route('categories.index') }}" :active="request()->routeIs('categories.index')">
        {{ __('Index') }}
      </x-nav-link>
      <!-- Create -->
      <x-nav-link href="{{ route('categories.create') }}" :active="request()->routeIs('categories.create')">
        {{ __('Create') }}
      </x-nav-link>

    </div>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="container-fluid page-body-wrapper">
          <div class="container" align="left">
            <!-- <h1 class="category">カテゴリー</h1> -->

            <!-- @if(session()->has('message'))

            <div class="alert alert-success">

              <button type="button" class="close" data-dismiss="alert">x</button>

              {{session()->get('message')}}

            </div>

            @endif -->
            <!-- <div class="container mt-3" style="max-width: 720px;"> -->
            <!-- <div class="text-right">
                <a href="{{ url('/categories/index') }}">＜ 戻る</a>
              </div> -->
            <div class="p-4">
              <form action="{{route('categories.shop')}}" method="post">
                @csrf
                <div>
                  <x-label for="name" value="{{ __('カテゴリ名') }}" />
                  <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                  <x-input-error for="name" class="mt-2" />
                  <!-- <label for="categoryAdd" class="font-weight-bold">新規カテゴリー追加</label>
                  <input style="color: white;" type="text" class="form-control" id="categoryAdd" name="name" />
                
                  <button type="submit" class="btn btn-primary">追加</button> -->

                </div>
              </form>
            </div>

            <!-- <div class="my-4">
                <a href="{{ url('/showcategory/') }}">＞ 一覧・編集ページへ</a>
              </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</x-app-layout>