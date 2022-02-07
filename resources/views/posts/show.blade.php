@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post->image }}" class="ps-5 w-100">
        </div>
        <div class="col-4 bg-white p-0 m-0 rounded-3">
            <div class="d-flex align-items-center m-2 fw-bold fs-5 justify-content-between">
                <div class="d-flex align-items-center">
                    <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle" style="width:40px">
                    <a href="/profile/{{ $post->user->id }}" class="px-3 text-decoration-none">
                        <span class="text-dark">{{ $post->user->username }}</span>
                    </a>
                    <follow-button user-id="{{ auth()->user()->id }}" follows="{{ $follows }}"
                        likes-count="{{ $post->likes->count() }}"></follow-button>
                </div>

                <div class="d-flex justify-content-end">
                    @if(auth()->user()->id == $post->user->id)
                        <form action="/post/{{ $post->id }}" method="post">
                            @method('delete')
                            @csrf

                            <div class="dropdown">
                                <a class="btn bg-white fs-4" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots"></i>
                                </a>
                              
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <div class="text-center">
                                        <li>
                                            <a class="dropdown-item">
                                                <button class="btn btn-link text-decoration-none text-danger p-0 m-0">Delete Post</button>
                                            </a>
                                        </li>
                                        <li><a class="dropdown-item m-0">Close</a></li>
                                    </div>
                                </ul>
                            </div>

                        </form>
                    @endif
                </div>
            </div>

            <hr class="p-0 m-0">

            <div class="p-3 rounded overflow-auto h-75">
                <div class="d-flex">
                    <div class="fw-bold pe-2 pb-1">
                        <a href="/profile/{{ $post->user->id }}" class=" text-decoration-none">
                            <div class="text-dark">{{ $post->user->username }}</div>
                        </a>
                    </div>
                    <div>
                        {{ $post->caption }}
                    </div>
                </div>
                
                @foreach($post->comments as $comment)
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex">
                            <div class="fw-bold pe-2 fw-bold">
                                <a href="/profile/{{ $comment->user->id }}" class=" text-decoration-none">
                                    <div class="text-dark">{{ $comment->user->username }}</div>
                                </a>
                            </div>
                            <div>
                                {{ $comment->comment }}
                            </div>
                        </div>
                        <div>
                            @if(auth()->user()->id==$comment->user->id)
                                <form action="/comment/{{ $comment->id }}" method="post">
                                    @method('delete')
                                    @csrf
                                
                                    <input class="visually-hidden" type="text" name="commentId" value="{{ $comment->id }}">
                                    <div class="dropdown">
                                        <a class="btn bg-white fs-5 p-0 m-0" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots"></i>
                                        </a>
                                      
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <div class="text-center">
                                                <li>
                                                    <a class="dropdown-item">
                                                        <button class="btn btn-link text-decoration-none text-danger p-0 m-0">Delete Comment</button>
                                                    </a>
                                                </li>
                                                <li><a class="dropdown-item m-0">Close</a></li>
                                            </div>
                                        </ul>
                                    </div>
                                
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <hr class="p-0 m-0">

            <div class="bg-white">
                <div>
                    <post-panel post-id="{{ $post->id }}"
                        likes="{{ $post->likes->contains(auth()->user()->id) }}"
                        likes-count="{{ $post->likes->count() }}"></post-panel>
                </div>

                <div>
                    <form action="/comment/{{ $post->id }}" method="post">
                        @csrf

                        <div class="d-flex mx-2">
                            <div class="w-100 h-100">
                                <textarea id="comment" type="text" class="form-control" name="comment" required
                                    autocomplete="comment" autofocus style="resize: none;"></textarea>
                            </div>

                            <div>
                                <button class="m-0 btn btn btn-link text-decoration-none text-danger fs-5">Send</button>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
