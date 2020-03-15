@extends('__template')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4 mb-4 display-4">Social Graph</h1>
        <div class="row">
            <div class="col-md-3">
                @include('users.partials.users-list')
            </div>
            <div class="col-md-9">
                @if(! is_null($selectedUser))
                    @include('users.partials.user-details')
                @else
                    <div class="lead text-center mt-5">No one user selected</div>
                    <p class="small text-center">
                        Please, select a user to see all related information.
                    </p>
                @endisset
            </div>
        </div>
    </div>
@endsection