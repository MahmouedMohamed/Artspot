@extends('layouts.layout')
@section('head')
    <script>
        console.log(color);
        var color = 'rgba(255,0,0,0.7)';

        function likePost(postId) {
            $(document).ready(function () {
                $("#heart").unbind().click(function x() {
                    if (color === 'rgba(255,0,0,0.7)') {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.get("/likePost/" + postId, function (data) {
                            console.log("Data Loaded: ");
                        });
                        color = 'yellow';
                    } else {
                        color = 'rgba(255,0,0,0.7)';
                    }
                    $("#heart").css('color', color);
                });
            });
        }

        function changeType() {
            console.log(document.getElementById('postType').checked);
            if (document.getElementById("postType").checked) {
                $('#normalPost').attr("hidden", false);
                $('#normalProject').attr("hidden", true);
                console.log('now post');
            } else {
                $(document).ready(function () {
                    $('#normalPost').attr("hidden", true);
                    $('#normalProject').attr("hidden", false);
                });
                console.log('now Project');
            }
        }

        function setbg(color, type) {
            $(document).ready(function () {
                $('#body' + type).css('background-color', color);
            });
            // document.getElementById("body").style.background=color
        }

        // $('.textarea').autoResize();
    </script>
@endsection
@section('content')
    <section class="px-8">
        <main class="container">
            <div class="d-flex justify-content-between">
                <div id="PostsSection">
                    <div id="form" class="border border-blue-400 rounded-lg lg:mx-10">
                        <div class="flipswitch">
                            <input type="checkbox" id="postType" name="flipswitch" class="flipswitch-cb" onchange="changeType()" checked>
                            <label class="flipswitch-label" for="postType">
                                <div class="flipswitch-inner"></div>
                                <div class="flipswitch-switch"></div>
                            </label>
                        </div>
                        @include('home.post_form')
                        @include('home.project_form')
                    </div>
                    <br>
                    @include('timeline')
                </div>
                <div id="friendsSection">
                    <h3>Following</h3>
                    <ul style="list-style: none;padding-left: 5px;padding-right: 10px">
                        @foreach(auth()->user()->follows as $user)
                            <li><a href="profile/{{$user->id}}">
                                    <img id="avatar" src="{{$user->avatar()}}" class="rounded-full">
                                </a>
                                <a href="profile/{{$user->id}}"><span id="name">{{$user->name}}</span></a>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </main>
    </section>
    {{--</div>--}}
    {{--</main>--}}
    {{--<br>--}}


    {{--@can('view_reports')--}}
    {{--<button>View Reports</button>--}}
    {{--@endcan--}}

@endsection
