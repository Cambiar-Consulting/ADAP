@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-10 mx-auto">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Register</li>
                </ol>
            </nav>
            <h2>Register</h2>
            <div class="card">
                {{ html()->form('POST', route('users.store'))->open() }}
                <div class="card-body">
                    <div class="form-group">
                        {{ html()->bootText(name: 'first_name', required: true) }}
                    </div>
                    <div class="form-group">
                        {{ html()->bootText(name: 'middle_name', required: false) }}
                    </div>
                    <div class="form-group">
                        {{ html()->bootText(name: 'last_name', required: true) }}
                    </div>
                    <div class="form-group">
                        {{ html()->bootText(name: 'alias', required: false) }}
                    </div>
                    <div class="form-group">
                        {{ html()->bootText(name: 'email', required: false) }}
                    </div>
                    <div class="form-group">
                        {{ html()->bootPhone(name: 'phone_number', required: false) }}
                    </div>
                    <div class="form-group">
                        {{ html()->bootDate(name: 'date_of_birth', required: true) }}
                    </div>
                    <div class="form-group">
                        {{ html()->bootSSN(name: 'ssn', labelName: 'Social Security Number', required: false) }}
                    </div>
                    <div class="form-group">
                        {{ html()->bootSelect(name: 'agency_id', labelName: 'Agency', options: $agencies, required: false) }}
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-3">
                            {{ html()->submit('Register')->class('btn btn-primary float-right') }}
                        </div>
                    </div>
                </div>
                {{ html()->form()->close() }}
            </div>
        </div>
    </div>
@endsection
