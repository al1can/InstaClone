<div>
    <div class="dropdown">
        <input class="bg-secondary p-2 text-dark bg-opacity-25 rounded-3 border-0" aria-expanded="false" style="outline:none" wire:model="search"
            type="text" placeholder="Search users..." />

        @if(!$users->isEmpty())
            <div class="dropdown-menu pt-0 mx-0 rounded-3 overflow-hidden" style="display:block !important">
                <ul class="list-unstyled mb-0">
                    @foreach($users as $user)
                        <li class="d-flex align-items-center">
                            <div class="dropdown-item d-flex align-items-center gap-2 py-2">
                                <a href="/profile/{{ $user->id }}" class="btn text-underline-none">{{ $user->username }}</a>
                                <a href="/messages/{{ $user->id }}" class="btn btn-primary me-0">DM</a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

</div>
