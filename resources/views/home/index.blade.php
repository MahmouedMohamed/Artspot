@extends('layouts.layout')
@section('head')
    <link href="/css/index.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <script>
        $( document ).ready(function() {
            $(".vertical").carousel({
                    vertical: true
            })
        });
    $(document).ready(function () {
            $("#takeMeTour").hover(function () {
                document.getElementById('takeMeTour').innerHTML='Let\'s go 🏃🏃‍♀️';
            },function(){
                document.getElementById('takeMeTour').innerHTML='Take a tour';
            });
    });

    </script>
    <div id="carouselExampleIndicators" class="carousel slide vertical" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="d-block w-100" style="text-align: start">
                    <img src="/images/204-2048066_color-brushes-with-transparent-color-brush-stroke-png.png">
                    {{--<img src="/images/5134523452345.png">--}}
                    <div class="words">
                        <h1>ART SPOT</h1>
                        <h2>Your Design<br/>is your way of living.</h2>
                        <a id="takeMeTour" class="btn btn-outline-primary" href="#">Take a tour</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/images/14-142379_color-smoke-holi-png-image-holi-png-images.png">
                {{--<img src="/images/5134523452345.png">--}}
                <div class="words">
                    <h1>ART SPOT</h1>
                    <h2>Your Design<br/>is your way of living.</h2>
                    <a id="takeMeTour" class="btn btn-outline-primary" href="#">Take a tour</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/images/art-png-images-7.png">
                {{--<img src="/images/5134523452345.png">--}}
                <div class="words">
                    <h1>ART SPOT</h1>
                    <h2>Your Design<br/>is your way of living.</h2>
                    <a id="takeMeTour" class="btn btn-outline-primary" href="#">Take a tour</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('copyrights')
    {{--Photo by Steve Johnson from Pexels--}}
    Photo by Elijah O'Donnell from Pexels
@endsection