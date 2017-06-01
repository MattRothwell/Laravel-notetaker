<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    {!! Html::style('bootstrap/css/bootstrap.min.css') !!}
    {!! Html::style('css/styles.css') !!}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Smart Your Revision') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <script>
        $(document).ready(function() {
          $('#testModal').on('show.bs.modal', function(e) {
            var id = $(e.relatedTarget).data('id');
            $.ajax({
                cache: false,
                type: 'POST',
                url: 'test/index.blade.php',
                data: 'ID=' + id,
                success: function(data){
                    $modal.find('.edit-content').html(data);
                }
            })
          });
          $('#reveal').click(function() {
              $('.menu').slideToggle("fast");
          });
        });
    </script>
    <script type="text/javascript">
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        {{ config('app.name', 'Smart Your Revision') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    @if (Auth::User())
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="{{url('/course') }}"> Courses </a>
                            </li>
                            <li>
                                <a href="{{url('/Tests') }}"> Test Yourself </a>
                            </li>

                        </ul>
                    @endif
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <!--Search Box -->
                            <li>
                            {!! Form::open(['method'=>'GET', 'url' => 'home','class'=>'navbar-form navbar-right','role'=>'search'])  !!}
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" name="search" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default-sm" type="submit">
                                        <i class="fa fa-search">Search</i>
                                    </button>
                                </span>
                            </div>
                            {!! Form::close() !!}
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->username }} <span class="caret"></span><span class="glyphicon glyphicon-user"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('user/'.Auth::user()->username.'') }}">My Account</a>
                                    </li>
                                    @if (Auth::User()->admin == 1)
                                    <li><a href="{{url('/user') }}">Admin</a>
                                    </li>
                                    @endif
                                    <li><a href="{{url('/user/colleagues') }}">Colleagues</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    @include('layouts.messages')
    @yield('success')
    @yield('main')
</body>
</html>
