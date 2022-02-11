@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <form action="/messages/send" method="post">
            @csrf

            

            <div class="d-flex">
                <label for="caption" class="col-md-4 col-form-label text-md-right">Message</label>
                <input id="body" type="text" class="form-control" name="body" required autofocus>
            </div>

            <button class="btn btn-primary">Send</button>

        </form>
    </div>
</div>

@endsection
