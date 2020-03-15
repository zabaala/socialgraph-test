<div class="card mb-5">
    <div class="card-header">
        <span class="lead">User info</span>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <label for="first_name" class="form-label">
                    <small>First Name</small>
                </label>
                <input type="text" class="form-control-plaintext" readonly id="first_name" value="{{ $selectedUser->first_name }}" />
            </div>

            <div class="col-md-3">
                <label for="surname" class="form-label">
                    <small>Surname</small>
                </label>
                <input type="text" class="form-control-plaintext" readonly id="surname" value="{{ $selectedUser->surname }}" />
            </div>

            <div class="col-md-3">
                <label for="age" class="form-label">
                    <small>Age</small>
                </label>
                <input type="text" class="form-control-plaintext" readonly id="age" value="{{ $selectedUser->age }}" />
            </div>

            <div class="col-md-3">
                <label for="gender" class="form-label">
                    <small>Gender</small>
                </label>
                <input type="text" class="form-control-plaintext" readonly id="gender" value="{{ $selectedUser->gender }}" />
            </div>
        </div>
    </div>
</div>

<div class="row mb-5">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header lead">Connections of Connections</div>
            <div class="body">
                <ul class="list-group">
                    @foreach($selectedUser->connectionsOfConnections as $connection)
                        <?php $user = $connection->user ?>
                        <li class="list-group-item small">
                            <a href="{{ route('users.index', ['user' => $user->id]) }}">
                                {{ $user->fullName }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header lead">Suggested Connections</div>
            <div class="body">
                <ul class="list-group">
                    @foreach($selectedUser->suggestedConnections as $connection)
                        <?php $user = $connection->user ?>
                        <li class="list-group-item small">
                            <a href="{{ route('users.index', ['user' => $user->id]) }}">
                                {{ $user->fullName }}
                            </a>
                        </li>
                    @endforeach

                    @if(! count($selectedUser->suggestedConnections))
                        <li class="list-group-item text-center text-muted small">Has no suggestions for this user</li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>

<hr class="mb-5">

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header lead">Suggested Countries</div>
            <div class="body">
                <ul class="list-group">
                    @foreach($selectedUser->suggestedCountries as $suggestion)
                        <li class="list-group-item small">{{ $suggestion->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

