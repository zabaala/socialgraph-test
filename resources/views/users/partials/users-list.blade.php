<div class="card mb-5">
    <div class="card-header">
        <span class="lead">Available Users</span>
    </div>
    <ul class="list-group">
        @foreach($users as $user)
            <li class="list-group-item">
                <a href="{{ route('users.index', ['user' => $user->id]) }}">
                    {{ $user->fullName }}
                </a>
            </li>
        @endforeach
    </ul>
</div>