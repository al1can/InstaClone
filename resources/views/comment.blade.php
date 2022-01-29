
<form action="/comment/{{$post->id}}" method="post">
    @csrf

    <div>
        <div class="d-flex">
            <div class="d-flex">
                    <textarea id="comment" type="text" class="form-control @error('comment') is-invalid @enderror"
                    name="comment" value="{{ old('comment') }}" required autocomplete="comment" autofocus
                    style="resize: none; width: 23vw; height: 12vh;"></textarea>

                @error('comment')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div>
                <button class="ms-2 btn btn-primary">Send</button>
            </div>
        </div>
    </div>
</form>