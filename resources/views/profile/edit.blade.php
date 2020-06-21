@extends('layouts.layout')
@section('content')
    <form method="POST" action="/profile/{{$user->id}}/edit" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="mb-4">
            <label class="d-block mb-2 text-uppercase font-weight-bold text-xl-center text-gray-700" for="name">
                Name
            </label>
            <input class="border border-secondary p-2 w-100" type="text" name="name" id="name" value="{{$user->name}}" required >
            @error('name')
                <p class="text-xl-center alert-danger mt-2">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="d-block mb-2 text-uppercase font-weight-bold text-xl-center text-gray-700" for="email">
                Email
            </label>
            <input class="border border-secondary p-2 w-100" type="email" name="email" id="email" value="{{$user->email}}" required>
            @error('email')
            <p class="text-xl-center alert-danger mt-2">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="d-block mb-2 text-uppercase font-weight-bold text-xl-center text-gray-700" for="password">
                Password
            </label>
            <input class="border border-secondary p-2 w-100" type="password" name="password" id="password" required>
            @error('password')
            <p class="text-xl-center alert-danger mt-2">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="d-block mb-2 text-uppercase font-weight-bold text-xl-center text-gray-700" for="password_confirmation">
                Password Confirmation
            </label>
            <input class="border border-secondary p-2 w-100" type="password" name="password_confirmation" id="password_confirmation" required>
            @error('password_confirmation')
            <p class="text-xl-center alert-danger mt-2">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="d-block mb-2 text-uppercase font-weight-bold text-xl-center text-gray-700" for="profile_pic">
                Profile Picture
            </label>
            <img src="{{$user->profile->profilePic()}}" style="display: block;margin-left: auto;margin-right: auto;width: 20%;">
            <input class="border border-secondary p-2 w-100" type="file" name="profile_pic" id="profile_pic" value="{{$user->profile->profile_pic}}">
            @error('profile_pic')
            <p class="text-xl-center alert-danger mt-2">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="d-block mb-2 text-uppercase font-weight-bold text-xl-center text-gray-700" for="banner">
                Banner
            </label>
            <input class="border border-secondary p-2 w-100" type="file" name="banner" id="banner" value="{{$user->profile->banner}}">
            @error('banner')
            <p class="text-xl-center alert-danger mt-2">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="d-block mb-2 text-uppercase font-weight-bold text-xl-center text-gray-700" for="bio">
                Bio
            </label>
            <input class="border border-secondary p-2 w-100" type="text" name="bio" id="bio" value="{{$user->profile->bio}}">
            @error('bio')
            <p class="text-xl-center alert-danger mt-2">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-6">
            <button type="submit" class="bg-secondary text-white rounded py-2 px-4">
                Submit
            </button>
        </div>
    </form>
@endsection