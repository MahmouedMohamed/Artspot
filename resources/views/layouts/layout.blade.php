<!DOCTYPE>
<html>
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
                        console.log( "Data Loaded: " + data );
                    });
                }
            })
        });
    </script>
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
    <script>
        $(document).ready(function(){
            $(window).bind('scroll', function() {
                var navHeight = $('#nav-bar').height()+10;//10 = padding bot
                if ($(window).scrollTop() > navHeight) {
                    $('#nav-bar').addClass('fixed');
                }
                else {
                    $('#nav-bar').removeClass('fixed');
                }
            });
        });
    </script>

    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet"/>
    <link href="/css/default.css" rel="stylesheet" type="text/css" />
    <link href="{{mix('css/app.css')}}" rel="stylesheet" type="text/css"/>
    <link href="\css\ogive.css" rel="stylesheet" type="text/css"/>
    <link href="\css\fonts.css" rel="stylesheet" type="text/css"/>
    @yield('head')
</head>
<body>
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="/about">About us</a>
    <a href="/contact">Contact</a>
    <a href="{{ route('logout') }}"
       onclick="event.preventDefault();
       document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>
<div id="nav-bar">
        <div id="logo">
            <img src="/images/ogive_version_2.png" alt="Artspot">
            Artspot
    </div>
        <div id="menu">
            <ul>
                @if(auth()->user())
                    <li class="{{Request::is('/index')? 'current_page_item' : ''}}" id="menuItem">
                        <a href="/index"><i id="icon"class="fa fa-home"></i></a>
                    </li>
                    <li class="{{Request::is('profile/'.auth()->user()->id)? 'current_page_item' : ''}}" id="menuItem">
                        <a href="/profile/{{auth()->user()->id}}"><i id="icon"class="fa fa-user"></i></a>
                    </li>
                    <li class="{{Request::is('messages')? 'current_page_item' : ''}}" id="menuItem">
                        <a href="/messages"><i id="icon"class="fa fa-comments"></i></a>
                    </li>
                    <li class="{{Request::is('search')? 'current_page_item' : ''}}" id="menuItem">
                        <a href="/search"><i id="icon"class="fa fa-search"></i></a>
                    </li>
                @endif
                    <!-- Authentication Links -->
                @if(!auth()->user())
                    <li class="{{Request::path()==='login'? 'current_page_item' : ''}}"
                        style="border-right: 1px solid rgba(255,215,0,0.3);">
                        <a style="height: fit-content;" href="{{ route('login') }}"
                        >Login</a></li>
                    <li class="{{Request::path()==='register'? 'current_page_item' : ''}}"
                        style="font-size: 12px;">
                        <a style="height: fit-content" href="{{ route('register') }}"
                        >Register</a></li>
                @else
                    @include('layouts.notification')
                    <li style="font-size:20px;height:fit-content;padding-top:2px;padding-left:10px;color:white;cursor:pointer" onclick="openNav()">&#9776;</li>
                @endif
            </ul>
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
