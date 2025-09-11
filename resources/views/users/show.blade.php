@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-10 mx-auto">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('agency.index') }}">Users</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $user->fullName() }}</li>
                </ol>
            </nav>
            <h2>{{ $user->fullName() }}</h2>
            <div class="card">
                <table class="table table-striped table-bordered">
                    <thead></thead>
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $user->id }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $user->fullName() }}</td>
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
                            <td>{{ $user->date_of_birth->format('m/d/Y') }}</td>
                        </tr>
                        <tr>
                            <th>SSN</th>
                            <td>{{ $user->ssn }}</td>
                        </tr>
                        <tr>
                            <th>Agency</th>
                            <td>{{ $user->agency->name }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
