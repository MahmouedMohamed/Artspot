<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show(Post $post)
    {
        return view('posts.show',['post'=>$post]);
    }
    public function store(){
        $this->validatePost();
        $post = new Post(request(['body']));
        $post->user_id = auth()->user()->id;
        $post->save();
        return redirect(route('home'));
    }
    public function edit(Post $post){
        $this->authorize('update',$post);
        return View('posts.edit',[
            'post' => $post
        ]);
    }
    public function update(Post $post){
        $this->authorize('update',$post);  ////we are authorize update method in the 'article' policy 'it's based on second argument'
        $post->update(
            $this->validatePost()
        );
        return(redirect($post->path()));
    }
    public function destroy(Post $post){
        $this->authorize('delete',$post);
        $post->delete();
        return redirect(route('home'));
    }
    public function filterBy(){
//        return Article::all()->filter(function ($article){return $article->user_id == 1;});
//        return Article::all()->filter(function ($article){return $article->id > 1;})->map(function($article){return $article->id*9;});
//        return Article::with('tags')->get();  //returns each article with tags associated with
//        return Article::all()->pluck('tags')->flatten()->pluck('name')->unique(); //get tags then group them together then get name of them and remove duplicated
//        dd(resolve('App/Article'),resolve('App/Article'));  //get binded value corresponding to that key 'App/Article'
//        dd(File::append('C:\Users\mahmo\AppData\Roaming\Composer\vendor\bin\Project\New Text Document.txt','hi'));
//        Cache::forget('key');
//        Cache::add('key', 'hi', 1440);
//        Cache::forget('key');  //without this it will STILL print hi
//        Cache::remember('key',1660,function(){return 'hello';});//key , value , seconds
//        dd(Cache::get('key', 'default'));
    }
    private function validatePost()
    {
        return request()->validate([
            'body' => ['required','min:3','max:255'],
        ]);
    }
}
