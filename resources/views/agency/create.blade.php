@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-10 mx-auto">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('agency.index') }}">Agencies</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Agency</li>
            </ol>
        </nav>
        <h2>Create Agency</h2>
        <div class="card">
            {{ html()->form('POST', route('agency.store'))->open() }}
            @include('agency._form')
            
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-3">
                        {{ html()->submit('Add Agency')->class('btn btn-primary float-right') }}
                    </div>
                </div>
            </div>
            {{ html()->form()->close() }}
        </div>
    </div>
</div>
@endsection