 @forelse($posts as $post)
        <div id="post"
             style="
{{$loop->first?'border-top-left-radius: 10px;border-top-right-radius:10px' : ''}}
             {{$loop->last?'border-bottom-left-radius: 10px;border-bottom-right-radius:10px;margin-bottom:10px' : ''}}
                ">
            <ul>
                <li><a href="profile/{{$post->author->id}}"> <img id="avatar"
                                                                  src="{{$post->author->profile->profilePic()}}"
                                                                  class="rounded-full"></a>

                    <span><a href="profile/{{$post->author->id}}">{{$post->author->name }}</a></span>
                    <a href="{{$post->path()}}">{{$post->created_at}}</a>
                </li>
            </ul>
            <br>
            <p>{{$post->body}}</p>
            <div style="width: 100%;place-content:space-between;padding-left:10%;padding-right:10%;display: inline-flex">
                <i id="heart" onclick="likePost({{$post->id}})" class="fa fa-heart d-lg-inline-flex"
                   style="width:max-content;padding-right:10px;font-size: 25px">23</i>
                <i id="comment" onclick="commentOnPost({{$post->id}})"
                   class="fa fa-comment d-lg-inline-flex"
                   style="width: max-content;font-size: 25px">23</i>
                <i id="share" onclick="sharePost({{$post->id}})" class="fa fa-share d-lg-inline-flex"
                   style="width: max-content;font-size: 25px">23</i>
            </div>
        </div>
    @empty
        <p>No Posts!</p>
 @endforelse