@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post->image }}" class="ps-5" style="width:750px">
        </div>
        <div class="col-4">
            <div class="d-flex align-items-center">
                <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle" style="width:50px">
                <h5 class="ps-3 fw-bold">
                    <a href="/profile/{{ $post->user->id }}" class=" text-decoration-none">
                        <span class="text-dark">{{ $post->user->username }}</span>
                    </a>
                    <span class="px-1">•</span>
                    <a href="#" class="text-dark text-decoration-none">Follow</a>
                </h5>
            </div>
            <hr>
            <p class='pt-3'>
                <span class="fw-bold pe-3 fw-bold">
                    <a href="/profile/{{ $post->user->id }}" class=" text-decoration-none">
                        <span class="text-dark">{{ $post->user->username }}</span>
                    </a>
                </span>{{ $post->caption }}
            </p>
        </div>
    </div>
</div>
@endsection
