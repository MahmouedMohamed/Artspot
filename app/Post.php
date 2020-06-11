<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['body'];
    public function path(){
        return route('posts.show',$this);
    }
    public function author(){
        return $this->belongsTo(User::class,'user_id'); //find with foreign key called used_id
    }
}
