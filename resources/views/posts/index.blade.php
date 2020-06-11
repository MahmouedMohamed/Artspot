@extends('layout')
@section('content')
    <div id="wrapper">
        <div id="page" class="container">
                    @forelse($posts as $post)
                <div id="article">
{{--                        <a href="{{$post->path()}}" id="title">{{$post->title}}</a>--}}
                    <br>
                        <img src="/images/banner.jpg" alt="" class="image image-full" />
                    <br>
                        <p>{{$post->body}}</p>

                </div>
                    @empty
                        <p>No Posts!</p>
                    @endforelse
        </div>
    </div>
@endsection