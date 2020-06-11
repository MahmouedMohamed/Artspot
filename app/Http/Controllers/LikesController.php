<?php

namespace App\Http\Controllers;

use App\Events\PostLiked;
use App\Post;

class LikesController extends Controller
{
    public function likePost(Post $post){
        $post->author !=auth()->user()?
       event(new PostLiked(auth()->user(),$post,$post->author)) //when post liked event dispatch it will trigger sendpostliked notification listener
:null;
//        dd(auth()->user(),$article->id,$article->author);
    }
    public function testLikePost(){

    }
}
