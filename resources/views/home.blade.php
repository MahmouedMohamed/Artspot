@extends('layouts.app')

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            @forelse($posts as $post)
                <div id="post">
                    <a href="{{$post->path()}}" id="title">{{$post->created_at}}</a>
                    <br>
                    <p>{{$post->body}}</p>
                    <a href="{{ url('/likePost/' . $post->id) }}" class="btn btn-xs btn-info pull-right">Like</a>
                </div>
            @empty
                <p>No Posts!</p>
            @endforelse
        </div>
    </div>

    <br>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div>
                        @can('view_reports')
                            <button>View Reports</button>
                        @endcan
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        You are logged in {{auth()->user()->name}} !


                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
