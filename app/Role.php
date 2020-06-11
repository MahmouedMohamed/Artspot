<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded=[];
    public function abilities()
    {
        return $this->belongsToMany(Ability::class)->withTimeStamps();
    }
    public function allowTo($ability){
        $this->abilities()->sync($ability,false);
    }
}
