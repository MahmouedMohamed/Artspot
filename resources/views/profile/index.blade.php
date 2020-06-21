@extends('layouts.layout')
@section('content')
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <header>
        <div class="position-relative" style="height:calc( 20% + 250px)">
            <img src="{{$user->profile->banner()}}" class="mb-2" style="width: 80%;margin-right:10%;margin-left:10%;height: 40vh">
            <img src="{{$user->profile->profilePic()}}" class="position-absolute" style="box-shadow:1px 1px 10px 3px black;transform: translateX(-50%) translateY(50%);left: 50%;border-radius: 100%;width: 250px;height: 250px">
        </div>
        @can('update',$user->profile)
        <a class="btnV2" style="position: absolute;left: calc(100% - 10%)" href="/profile/{{auth()->user()->id}}/edit">Edit profile</a>
        @endcan
        <div class="wrapper" style="text-align: center">
        <div class="d-inline-flex"><h1>{{$user->name}}</h1>
            <h2 href="#" data-toggle="tooltip" title="{{$user->email_verified_at?'Verified account': 'Not verified'}}!">{{$user->email_verified_at?'✅':'❌'}}</h2>
        </div>
        <div style="word-wrap: break-word;padding-left: 30%;padding-right: 30%"><p>{{$user->profile->bio()?$user->profile->profilePic():'No bio.'}}</p></div>
            <div><h4>Joined {{$user->created_at->diffForHumans()}} </h4></div>
        @if($user->id != auth()->user()->id)
            <div>
                <form method="POST" action="/profile/{{$user->id}}/follow">
                    @csrf
                    <button type="submit" class="btn">{{auth()->user()->following($user)? '- Unfollow' : '+ Follow'}}</button>
                </form>
            </div>
        @endif
    </div>
    </header>



    </div>
    @include('timeline',['posts'=> $user->posts])
@endsection