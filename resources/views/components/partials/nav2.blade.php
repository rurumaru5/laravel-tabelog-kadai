<!-- ***** Menu Start ***** -->
<nav id="header" class="fixed w-full z-30 top-0 text-white">
  <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">

    <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 bg-white lg:bg-transparent text-black p-4 lg:p-0 z-20" id="nav-content">
      <a href="" class="logo">
        <h3 style="width: 200px;">NAGOYA<br>MESHI</h3>
      </a>
      <ul class="list-reset lg:flex justify-end flex-1 items-center">


        <li class="mr-3">

          @if (Route::has('login'))

          @auth

          <x-app-layout>

          </x-app-layout>

          @else
        <li class="mr-3"><a class="inline-block py-2 px-4 text-black font-bold no-underline" href="{{ route('login') }}">ログイン</a></li>

        @if (Route::has('register'))
        <li class="mr-3">
          <a class="inline-block py-2 px-4 text-black font-bold no-underline" href="{{url('register') }}">会員登録</a>
        </li>
        @endif
        @endauth

        @endif

        </li>
      </ul>
    </div>
  </div>
</nav>


<!-- ***** Menu End ***** -->



</header>