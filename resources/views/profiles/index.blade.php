@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{ $user->profile->profileImage() }}" alt="" class="rounded-circle w-100">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <div class="fs-2 me-4">{{ $user->username }}</div>

                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                </div>

                @can('update', $user->profile)
                    <a href="/post/create" class="btn btn-primary">Add New Post</a>
                @endcan
            </div>
            <div class="d-flex align-items-baseline">
                <!--<div class="pe-5"><strong>{{ $postCount }}</strong> posts</div>-->
                <!--<div class="pe-5"><strong>{{ $followersCount }}</strong> followers</div>--->
                <!--<div class="pe-5"><strong>{{ $followingCount }}</strong> following</div>-->

                <profile-panel 
                    user-id="{{ $user->id }}" 
                    image="{{ $user->profile->profileImage() }}" 
                    followers-count="{{ $followersCount }}"
                    following-count="{{ $followingCount }}" 
                    follows="{{ $follows }}" 
                    post-count="{{ $postCount }}"></profile-panel>

                @can('update', $user->profile)
                    <a href="/profile/{{ $user->id }}/edit" class="btn btn-primary">Edit Profile</a>
                @endcan
            </div>
            <div class="pt-3 fw-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url }}</a></div>
        </div>
    </div>
    <div class="row">
        @foreach($user->posts as $post)
        <div class="col-4 pb-4">
            <a href="/post/{{ $post->id }}">
                <img src="/storage/{{ $post->image }}" class="w-100">
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
