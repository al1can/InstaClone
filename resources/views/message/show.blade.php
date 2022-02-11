@extends('layouts.app')

@section('content')

<div class="container">
    @livewire('direct-messaging', ['user' => $user], key($user->id))
</div>

@endsection
