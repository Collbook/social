<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    @stack('css')

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a target="_blank"  class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <a class="dropdown-item" href="#"> Profile </a>

                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                @if (Auth::check())
                    
                    <div class="col-md-4">
                        <main class="py-4">
                            <ul class="list-group">
                                @if (Auth::user()->admin)
                                <div class="card-header">    
                                    <li class="list-group-item">
                                            <a href="{{ route('home') }}"> <span class=""></span><strong>Home</strong></a>
                                    </li>                               
                                    <li class="list-group-item">
                                        <a href="{{ route('channels.index') }}"><strong>Manager Channels</strong></a>
                                    </li>

                                    <li class="list-group-item">
                                        <a href="{{ route('forums.index') }}"><strong>Manager Discussions</strong></a>
                                    </li>

                                    {{--  <li class="list-group-item">
                                        <a href="{{ route('discussion.manager') }}"><strong>Manager Discussions</strong></a>
                                    </li>                                           --}}
                                </div>
                                @endif
                                <div class="card-header">
                                    <div class="list-group-item-success">
                                       <li class="list-group-item"><a href="#" style="text-decoration:none;"><strong>Channels</strong></a></li>
                                    </div>
                                    <div class="list-group-item">
                                        
                                        <li class="list-group-item">
                                            <a href="{{ route('forums.index') }}" style="font-size:16px"> <span class=""></span><small><strong>Home</strong></small></a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="/forums?filter=me" style="font-size:16px"> <span class=""></span><small><strong>My Discussions</strong></small></a>
                                        </li>

                                        <li class="list-group-item">
                                            <a href="/forums?filter=solved" style="font-size:16px"> <span class=""></span><small><strong>Answered Discussions</strong></small></a>
                                        </li>

                                        <li class="list-group-item">
                                            <a href="/forums?filter=unsolved" style="font-size:16px"> <span class=""></span><small><strong>Unanswer Discussions</strong></small></a>
                                        </li>
    
                                        {{--  using view share  --}}
                                        @if ($channels->count() > 0)
                                            @foreach ($channels as $channel)
                                                <li class="list-group-item">
                                                    <a href="{{ route('channel.filter',['slug'=>$channel->slug]) }}" style="font-size:16px"> <span class=""></span><small><strong>{{ $channel->title }}</strong></small></a>
                                                </li>
                                            @endforeach
                                        @else
                                            <li><strong>No data</strong></li>
                                        @endif
                                    </div>
                                </div>
                                
                            </ul>
                        </main>
                    </div>

                @endif

                <div class="col-md-8">
                    <main class="py-4">
                        @yield('content')
                    </main>
                </div>
            </div>
    
        </div>
    </div>
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
    @stack('js')
</body>
</html>
