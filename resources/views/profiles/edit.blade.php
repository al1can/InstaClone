@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col-8 offset-2">
    
                <div class="row text-center">
                    <h1>Edit Profile</h1>
                </div>

                <div class="row mb-3 d-flex pt-5">
                    <div class="d-flex">
                        <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                        name="title" value="{{ old('title') ?? $user->profile->title }}" required autocomplete="title" autofocus>
                    </div>

                    @error('title')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row mb-3 d-flex pt-5">
                    <div class="d-flex">
                        <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror"
                        name="description" value="{{ old('description') ?? $user->profile->description }}" autocomplete="description" autofocus>
                    </div>

                    @error('description')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row mb-3 d-flex pt-5">
                    <div class="d-flex">
                        <label for="url" class="col-md-4 col-form-label text-md-right">URL</label>
                        <input id="url" type="text" class="form-control @error('url') is-invalid @enderror"
                        name="url" value="{{ old('url') ?? $user->profile->url }}" autocomplete="url" autofocus>
                    </div>

                    @error('url')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row pt-5">
                    <div class="d-flex">
                        <label for="image" class="col-md-4 col-form-label text-md-right">Profile Image</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>
                    @error('image')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row w-50 offset-3 pt-3">
                    <button class="btn btn-primary">Save Profile</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
