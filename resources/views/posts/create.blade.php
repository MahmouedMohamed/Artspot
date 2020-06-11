@extends('layout')
@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css"/>
@endsection
@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <h1 class="heading has-text-weight-bold is-size-4">New Post</h1>
            <form method="post" action="/posts">
                @csrf
                <div class="field">
                    <label class="label" for="body">Body</label>
                    <div class="control">
                        <textarea class="textarea @error('body') is-danger @enderror" name="body" id="body">{{old('body')}}</textarea>
                    </div>
                    @error('body')
                    <p class="help is-danger">{{$errors->first('body')}}</p>
                    @enderror
                </div>
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit">Submit</button>
                    </div>
                    {{--<div class="control">--}}
                        {{--<button class="button is-text" type="submit">Cancel</button>--}}
                    {{--</div>--}}
                </div>
            </form>
        </div>
    </div>
@endsection