@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post->image }}" class="ps-5" style="width:750px; height:700px;">
        </div>
        <div class="col-4">
            <div class="d-flex align-items-center pb-2 bg-white">
                <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle m-2" style="width:40px">
                <div class="d-flex align-items-center ps-3 fw-bold fs-5">
                    <a href="/profile/{{ $post->user->id }}" class=" text-decoration-none">
                        <span class="text-dark">{{ $post->user->username }}</span>
                    </a>
                    <follow-button user-id="{{ auth()->user()->id }}" follows="{{ $follows }}"></follow-button>
                </div>
            </div>
            <hr class="p-0 m-0">
            <div class="p-3 bg-white rounded" style="height: 500px;">
                <div class="d-flex">
                    <div class="fw-bold pe-3 fw-bold">
                        <a href="/profile/{{ $post->user->id }}" class=" text-decoration-none">
                            <div class="text-dark">{{ $post->user->username }}</div>
                        </a>
                    </div>
                    <div>
                        {{ $post->caption }}
                    </div>
                </div>
                @foreach($post->comments as $comment)
                <div class="d-flex">
                    <div class="fw-bold pe-3 fw-bold">
                        <a href="/profile/{{ $comment->user->id }}" class=" text-decoration-none">
                            <div class="text-dark">{{ $comment->user->username }}</div>
                        </a>
                    </div>
                    <div>
                        {{ $comment->comment }}
                    </div>
                </div>
                @endforeach
            </div>
            <hr class="p-0 m-0">
            <div class="p-3 bg-white rounded" style="height: 100px">
                @include('comment')
            </div>
            <div>
                <like-button post-id="{{ $post->id }}" likes="{{ $post->likes->contains(auth()->user()->id) }}" likes-count="{{ $post->likes->count() }}"></like-button>
            </div>
        </div>
    </div>
</div>
@endsection
