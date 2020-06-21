<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function profilePic(){
        return
        $this->profile_pic?
         asset('storage/'.$this->profile_pic):
            '/images/123.png';
    }
    public function banner(){
        return
            $this->banner?
            asset('storage/'.$this->banner):
                '/images/123.png';
    }
    public function bio(){
        $this->bio;
    }
}
