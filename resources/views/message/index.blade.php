@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row bg-white">
            @foreach($contacts as $contact)
            <a href="/messages/{{ $contact->id }}" class="text-dark text-decoration-none">
                <div class="m-2 d-flex align-items-center justify-content-center gap-5">
                        <img src="{{$contact->profile->profileImage() }}" class="rounded-circle" style="width:150px">
                        <div class="fs-3 text">{{ $contact->username }}</div>
                    </div>
                </a>
            @endforeach
    </div>
</div>

@endsection