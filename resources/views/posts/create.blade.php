@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/post" enctype="multipart/form-data" method="post">
        @csrf

        <div class="row">
            <div class="col-8 offset-2">
    
                <div class="row text-center">
                    <h1>Add New Post</h1>
                </div>

                <div class="row mb-3 d-flex pt-5">
                    <div class="d-flex">
                        <label for="caption" class="col-md-4 col-form-label text-md-right">Post Caption</label>
                        <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" required autocomplete="caption" autofocus>
                    </div>

                    @error('caption')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row">
                    <div class="d-flex">
                        <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>
                    @error('image')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row w-50 offset-3 pt-3">
                    <button class="btn btn-primary">Add New Post</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
