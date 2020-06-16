@extends('layouts.layout')
@section('content')
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <header>
        <img src="{{$user->avatar()}}" style="margin-left: calc(50% - 15%); border-radius: 100% ;width: 30%">
        @if($user->id==auth()->user()->id)
        <a class="btnV2" style="position: absolute;left: calc(100% - 10%)" href="#">Edit profile</a>
        @endif
        <div class="wrapper" style="text-align: center">
        <div class="d-inline-flex"><h1>{{$user->name}}</h1>
            <h2 href="#" data-toggle="tooltip" title="{{$user->email_verified_at?'Verified account': 'Not verified'}}!">{{$user->email_verified_at?'✅':'❌'}}</h2>
        </div>
        <div style="word-wrap: break-word;padding-left: 30%;padding-right: 30%"><h4><p>klflajfklhsjfksjadlfnsdjkfnasjnfjksnafjnajsklnfjklnajlwjlfjwenffasnjasngjaanhmaeohmouedmarinahmammahouedmartinamahmouedmartinmahmouedmartinmahmouedmarhinmahmouedmartinmahmouedmarinmahmouedmargimahmouedmartinmahmouedmartinmahmouedmarhinmahmouedmarhinmahmouedmahar</p></h4></div>
            <div><h4>Joined {{$user->created_at->diffForHumans()}} </h4></div>
        @if($user->id != auth()->user()->id)
            <div><a class="btn" href="#">+ Follow</a></div>
        @endif
    </div>
    </header>



    </div>
    @include('timeline',['posts'=> $user->posts])
@endsection