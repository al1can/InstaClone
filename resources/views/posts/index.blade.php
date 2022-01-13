@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($posts as $post)
    <div class="row">
        <div>
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
        </div>
    </div>
    <div class="d-flex">
        <div class="col-8">
            <a href="/post/{{ $post->id }}">
                <img src="/storage/{{ $post->image }}" class="ps-5" style="width:750px">
            </a>
        </div>
        <div>
            <p class='pt-3'>
                <span class="fw-bold pe-3 fw-bold">
                    <a href="/profile/{{ $post->user->id }}" class=" text-decoration-none">
                        <span class="text-dark">{{ $post->user->username }}</span>
                    </a>
                </span>{{ $post->caption }}
            </p>
        </div>
    </div>
    @endforeach
    <div>
        <div class="pt-3 d-flex justify-content-center">
            {{ $posts->links("pagination::bootstrap-4") }}
        </div>
    </div>
</div>
@endsection
