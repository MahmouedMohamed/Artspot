<form method="post" action="/posts" id="normalPost">
    @csrf
    <div class="field">
        <div class="control">
            <textarea onfocus="setbg('#e5fff3','Post');" onblur="setbg('white','Post')" class="textarea w-full @error('body') is-danger @enderror" name="body"
                      id="bodyPost" placeholder="Hey there?" contenteditable>{{old('body')}}</textarea>
        </div>
        @error('body')
        <p class="help is-danger" style="color: red">{{$errors->first('body')}}</p>
        @enderror
    </div>
    <footer class="d-flex justify-content-between">
        <img id="avatar" src="{{auth()->user()->profile->profilePic()}}" class="rounded-full">
        <button type="submit">Submit</button>
    </footer>
</form>