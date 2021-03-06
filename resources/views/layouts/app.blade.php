<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ '仮想本棚 〜VirtualBookshelf〜' }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
              @guest
                <a class="navbar-brand text-dark mr-0 custom-form" href="{{ url('home/') }}">
                  <i class="fa fa-book mr-0"></i>
                    {{ ' 仮想本棚 ' }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
              @else
              <a class="navbar-brand text-dark mr-0 custom-form" href="{{ url('home/') }}">
                <i class="fa fa-book"></i>
                  {{ ' 仮想本棚 ' }}
              </a>
              <img src="{{ asset('storage/profile_image/' .auth()->user()->profile_image) }}" class="rounded-circle ml-2" width="50" height="50">
              <li class="nav-item dropdown list-inline text-light">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="opacity: 0; transform: translateX(-70%);">
                      {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="transform: translateX(-10%);">
                    <a href="{{ url('users/' .auth()->user()->id) }}" class="dropdown-item">プロフィール</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </div>
              </li>


              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                  <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">

                @endguest

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="btn nav-link text-primary" href="{{ url('products/all') }}">すべての投稿</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn nav-link text-primary mx-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="btn btn-outline-primary nav-link text-primary" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item ml-auto">
                              <a href="{{ url('products') }}" class="btn nav-link text-primary"><i class="fas fa-comments fa-fw mr-1"></i>タイムライン</a>
                            </li>
                            <li class="nav-item ml-auto">
                              <a href="{{ url('favorites/') }}" class="btn nav-link text-primary"><i class="fas fa-heart fa-fw mr-1"></i>いいね一覧</a>
                            </li>
                            <li class="nav-item ml-auto">
                              <a href="{{ url('users') }}" class="btn nav-link text-primary"><i class="fas fa-users fa-fw  mr-1"></i>登録者一覧</a>
                            </li>
                            <li class="nav-item ml-auto">
                              <a href="{{ url('products/create') }}" class="btn nav-link text-primary"><i class="fa-plus fa fa-book mr-1"></i>本棚に飾る</a>
                            </li>
                            <li class="nav-item ml-auto">
                              <a href="{{ url('users/bookshelf/' .auth()->user()->id) }}" class="btn nav-link text-primary"><i class="fa fa-book mr-1"></i>本 棚</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
