@extends('layouts.app')

@section('content')
<div class="container">
    @if($posts->count() == 0)
        <div class="bg-white rounded-3 text-center p-5">
            <div class="fs-3">There is no post to show!</div>
            <div class="fs-4">Follow more people to see what they shared!</div>
        </div>
    @else
        @foreach($posts as $post)
        <div class="row justify-content-center mb-5">
            <div class="bg-white p-0" style="width: 600px">
                <div>
                    <div>
                        <div class="d-flex p-3 align-items-center">
                            <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle" style="width:50px">
                            <h5 class="ps-3 fw-bold">
                                <a href="/profile/{{ $post->user->id }}" class=" text-decoration-none">
                                    <span class="text-dark">{{ $post->user->username }}</span>
                                </a>
                            </h5>
                        </div>
                    </div>
                </div>
                <div>
                    <div>
                        <a href="/post/{{ $post->id }}">
                            <img src="/storage/{{ $post->image }}" style="max-width:600px">
                        </a>
                    </div>
                    <div class="text-start">
                        <p class="p-3">
                            <span class="fw-bold pe-3 fw-bold">
                                <a href="/profile/{{ $post->user->id }}" class=" text-decoration-none">
                                    <span class="text-dark">{{ $post->user->username }}</span>
                                </a>
                            </span>{{ $post->caption }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @endif
    <div>
        <div class="pt-3 d-flex justify-content-center">
            {{ $posts->links("pagination::bootstrap-4") }}
        </div>
    </div>
</div>
@endsection
