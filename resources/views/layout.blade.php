<!DOCTYPE>
<html xmlns:v-on="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>OGIVE</title>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user-id" content="{{ auth()->user()? auth()->user()->id:'' }}">

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        var times=0;
        $(document).ready(function(){
            $("#motherNotification").unbind().click(function () {
                times++;
                if(times%2!=0){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.get( "/notification/readAll", function( data ) {
                        alert( "Data Loaded: " + data );
                    });
                }
            })
        });
        // $("#motherNotification").ready().click(function(e){
        //     console.log('xx');
        // e.stopPropagation();
        // });
    </script>
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet"/>
    <link href="\css\ogive.css" rel="stylesheet" type="text/css"/>
    <link href="\css\fonts.css" rel="stylesheet" type="text/css"/>
    <link href="{{mix('css/app.css')}}" rel="stylesheet" type="text/css"/>
    @yield('head')
</head>
<body>
<div id="header-wrapper">
    <div id="header" class="container">
        <div id="logo" style="vertical-align:baseline;">
            <h1><img src="/images/ogive_version_2.png" alt="OGIVE">
            {{--<a href="/" style="vertical-align:text-bottom;">OGIVE</a></h1>--}}
        </div>
        <div>

        </div>
        <div id="menu">
            <ul style="display: inline-flex;">
                <li class="{{Request::path()==='/'? 'current_page_item' : ''}}" id="menuItem"><a href="/"
                                                                                                 accesskey="1"
                                                                                                 title="">Homepage</a>
                </li>
                <li class="{{Request::is('about')? 'current_page_item' : ''}}" id="menuItem"><a href="/about" accesskey="3" title="">About
                        Us</a></li>
                <li class="{{Request::path()==='posts'? 'current_page_item' : ''}}" id="menuItem"><a
                            href="{{route('posts.index')}}" accesskey="4" title="">Posts</a></li>
                <li class="{{Request::path()==='contact'? 'current_page_item' : ''}}" id="menuItem"><a href="/contact" accesskey="5"
                                                                                                       title="">Contact Us</a></li>
                <!-- Authentication Links -->
                @if(!auth()->user())
                    <li class="{{Request::path()==='login'? 'current_page_item' : ''}}"
                        style="font-size: 10px; border-right: 1px solid gold;"><a href="{{ route('login') }}"
                        >Login</a></li>
                    <li class="{{Request::path()==='register'? 'current_page_item' : ''}}" style="font-size: 10px;"><a
                                href="{{ route('register') }}" accesskey="5" title="">Register</a></li>

                @else
                    <li class="" style="display: inline-block;text-align: start">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" style="color:blue;"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    <li class="list-group" style="display: inline-block;text-align: start">
                        <a id="navbarDropdown" class="nav-link" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img src="https://img.icons8.com/plasticine/100/000000/bell.png"
                                 style="width: 40px;height: 40px" id="motherNotification"/>
                        </a>
                        <div style="color: red; background-color: black" id="notification"
                             class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <ul style="color: red; background-color: black">
                                <li>
                                    <notification v-for="value in notifications" color="black">@{{value.body}}
                                        <br>
                                        <span style="color: red;">@{{value.date}}</span>
                                    </notification>
                                </li>
                            </ul>

                        </div>
                    </li>
            </ul>
            @endif
        </div>
    </div>
    @yield('header')
</div>

@yield('content')
<div id="copyright" class="container">
    <p>&copy; OGIVE 2020. All rights reserved.</p>
</div>
@yield('copyrights')
</body>
</html>
