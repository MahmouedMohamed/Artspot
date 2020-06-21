<?php
/**
 * Created by PhpStorm.
 * User: mahmoued
 * Date: 6/20/2020
 * Time: 4:59 AM
 */

namespace App;


trait Followable
{
    public function toggleFollow(User $user){
        if($this->following($user)){
            return $this->unFollow($user);
        }
        return $this->follow($user);
    }
    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }
    public function unFollow(User $user)
    {
        $this->follows()->detach($user);
    }
    public function following(User $user)
    {
        return $this->follows()->where('following_user_id',$user->id)->exists();
    }

    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');  //table name
    }
}