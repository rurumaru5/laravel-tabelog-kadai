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

  <!-- <x-slot name="nav">
    <div class="space-x-4">
      <x-nav-link href="{{ route('categories.index') }}" :active="request()->routeIs('categories.index')">
        {{ __('Index') }}
      </x-nav-link>
      <x-nav-link href="{{ route('categories.index') }}" :active="request()->routeIs('categories.index')">
        {{ __('Create') }}
      </x-nav-link>

    </div>


  </x-slot> -->

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div style="padding-bottom: 30px;" class="container-fluid page-body-wrapper">
          <div class="container" align="center">
            @if(session()->has('message'))

            <div class="alert alert-success">

              <button type="button" class="close" data-dismiss="alert">x</button>

              {{session()->get('message')}}

            </div>

            @endif

            <table class="w-full divide-y divide-gray-200">
              <thead class="font-bold text-gray-500 bg-indigo-200">
                <tr>
                  <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                    #
                  </th>
                  <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                    作成日
                  </th>
                  <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                    カテゴリ
                  </th>
                  <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                    編集
                  </th>
                  <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                    削除
                  </th>
                </tr>
              </thead>

              <tbody class="text-xs divide-y divide-grey-200 bg-indigo-50">
                <tr>
                  <td class="px-2 py-4 whitespace-nowrap">
                    カテゴリID
                  </td>
                  <td class="px-2 py-4 whitespace-nowrap">
                    作成日
                  </td>
                  <td class="px-2 py-4 whitespace-nowrap">
                    更新日
                  </td>
                  <td class="px-2 py-4 whitespace-nowrap">
                    <a class="btn btn-primary" href=""> 編集</a>
                  </td>
                  <td class="px-2 py-4 whitespace-nowrap">
                    <a class="btn btn-danger" href=""> 削除</a>
                  </td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>