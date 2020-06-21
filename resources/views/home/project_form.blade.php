<form method="post" action="/projects" id="normalProject" hidden>
    @csrf
    <div class="field">
        <div class="control">
            <textarea onfocus="setbg('#e5fff3','Project');" onblur="setbg('white','Project')"
                      class="textarea w-full @error('body') is-danger @enderror" name="body"
                      id="bodyProject" placeholder="New Project?"
                      contenteditable>{{old('body')}}</textarea>
        </div>
        @error('body')
        <p class="help is-danger">{{$errors->first('body')}}</p>
        @enderror
    </div>
    <footer class="d-flex justify-content-between">
        <img id="avatar" src="{{auth()->user()->profile->profilePic()}}" class="rounded-full">
        <button type="submit">Submit</button>
    </footer>
</form>