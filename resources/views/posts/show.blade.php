@extends('layout')
@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                <div class="title">
                    @can('update',$post)
                        <div id="form">
                        <form action="/posts/{{$post->id}}/edit" method="GET">
                            @csrf
                            <button type="submit"
                                    class="btn"
                                    >Update</button>
                        </form>
                        <form action="/posts/{{$post->id}}/" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="btn"
                            >Delete</button>
                        </form>
                        </div>
                    @endcan
                </div>
                <img src="/images/banner.jpg" alt="" class="image image-full" />
                <p>{{$post->body}}</p>
                    <p style="margin-top: 1em">
                        {{--tags:--}}
                        {{--@foreach($article->tags as $tag)--}}
                            {{--<a href="{{route('articles.index',['tag'=>$tag->name])}}">{{$tag->name}}</a>--}}
                        {{--@endforeach--}}
                    </p>
            </div>
        </div>
    </div>
@endsection