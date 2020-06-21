<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use function PHPSTORM_META\type;

class ProfilesController extends Controller
{
public function __construct()
{
    $this->middleware('auth');
}

    public function show(User $user){
        return view('profile.index',[
           'user' => $user
        ]);
    }
    public function edit(User $user){
        $this->authorize('update',$user->profile);
        return view('/profile.edit',[
            'user' => auth()->user()
        ]);
    }
    public function update(User $user){
//    dd(\request('profile_pic'));
        $attributes = request()->validate([
            'name' => ['string', 'required', 'max:255'],
            'email' => ['string','required','max:255','email',Rule::unique('users')->ignore($user)],
            'password' => ['string', 'required', 'min:8', 'max:255', 'confirmed'],
            'profile_pic' => ['file'],
            'banner' => ['file'],
            'bio' => ['max:100']
        ]);
        if(request('profile_pic'))
            $attributes['profile_pic'] = request('profile_pic')->store('profile pics');
        if(request('banner'))
            $attributes['banner'] = request('banner')->store('banners');
        $user->update($attributes);
//        dd(array_key_exists('profile_pic',$attributes));
        $user->profile()->update([
            'profile_pic'=>array_key_exists('profile_pic',$attributes)?$attributes['profile_pic']:$user->profile->profile_pic,
            'banner'=>array_key_exists('banner',$attributes)?$attributes['banner']:$user->profile->banner,
            'bio' =>request('bio')
        ]);
        return redirect('profile/'.$user->id)->with('user', $user);
    }
}
