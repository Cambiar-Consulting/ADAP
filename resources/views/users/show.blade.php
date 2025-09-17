@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-10 mx-auto">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $user->full_name() }}</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-6">
                    <h2>{{ $user->full_name() }}</h2>
                </div>
                <div class="col-6 text-right">
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success">Edit</a>
                </div>
            </div>
            <table class="table table-striped table-bordered">
                <thead></thead>
                <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $user->id }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $user->full_name() }}</td>
                    </tr>
                    <tr>
                        <th>Alias</th>
                        <td>{{ $user->alias }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th>Phone Number</th>
                        <td>{{ $user->phone_number }}</td>
                    </tr>
                    <tr>
                        <th>Date of Birth</th>
                        <td>{{ $user->date_of_birth() }}</td>
                    </tr>
                    <tr>
                        <th>SSN</th>
                        <td>{{ $user->ssn }}</td>
                    </tr>
                    <tr>
                        <th>Agency</th>
                        <td>{{ $user->agency ? $user->agency->name : '' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
