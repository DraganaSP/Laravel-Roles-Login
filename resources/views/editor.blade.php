@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in as EDITOR!') }}
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>    
                        <td>{{ $user->name }} </td>
                        <td>{{ $user->email }} </td>
                        <td>{{ $user->role->name }} </td>
                        <td>{{ $user->status }} </td>
                        <td>
                            @if(Auth::id() == $user->id)
                                @if( $user->status === 'Active' )
                                    <a href="{{ route('deactivateEditor', ['id' => $user->id]) }}" class="btn btn-sm btn-danger">Deactivate</a>
                                @else
                                    <a href="{{ route('activateEditor', ['id' => $user->id]) }}" class="btn btn-sm btn-success">Activate</a>
                                @endif
                                <a href="{{ route('deleteEditor', ['id' => $user->id]) }}" class="btn btn-sm btn-danger">Delete</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
