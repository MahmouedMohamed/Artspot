@extends('layout')
@section('content')
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card rounded">
                    <div class="card-header">Contact</div>

                    <div class="card-body">

                        <form method="POST" class="bg-white p-6 rounded shadow-md" action="/contact">
                            @csrf
                            <div class="form-group row">
                                <label for="message" class="col-md-4 col-form-label text-md-right">Message</label>

                                <div class="col-md-8 ">
                                    <textarea id="message" class="form-control @error('message') is-invalid @enderror" name="message" rows="3" placeholder="What's up?" required>{{ old('message') }}</textarea>
                                    @error('message')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-outline-primary rounded">
                                        Contact Us
                                    </button>
                                </div>
                            </div>
                            @if(session('message'))
                                <p class="text-xs mt-2 justify-content-center" style="color: forestgreen">
                                    {{session('message')}}
                                </p>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection