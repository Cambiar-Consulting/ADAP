@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-10 mx-auto">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create User</li>
            </ol>
        </nav>
        <h2>Profile</h2>
        <div class="card">
            {{ html()->modelForm($user, 'PUT', route('users.update', $user->id))->open() }}
                @include('users._form');
            {{ html()->closeModelForm() }}
        </div>
    </div>
</div>
@endsection