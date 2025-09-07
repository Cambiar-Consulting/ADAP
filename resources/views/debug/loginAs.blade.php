@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-10 mx-auto">
        <div class="card mb-5">
            <div class="card-header text-white bg-secondary">
                <div class="row">
                    <div class="col-md-11">Welcome to the ADAP Application</div>
                    <div class="col-md-1"><i class="fas fa-lg fa-address-card"></i></div>
                </div>
            </div>
            <div class="card-body">
                <p>Feel free to browse the application as any of the users.</p>
                <form action="{{ route('debug.login') }}" method="POST"> 
                    @csrf
                    <select class="selectpicker" data-live-search="true" name="user_id">
                        @foreach($roles as $role)
                            <optgroup label="{{ $role->name }}">
                                @foreach ($users[$role->id] as $user)
                                    <option value="{{ $user->user_id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                    <input type="submit" class="btn btn-secondary ml-3" value="Login" />
                </form>              
            </div>
        </div>
    </div>
</div>
@endsection