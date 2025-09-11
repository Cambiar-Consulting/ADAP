@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-10 mx-auto">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Agencies</li>
            </ol>
        </nav>
        <h2>Agencies</h2>
        <a class="btn btn-success my-3" href="{{ route('agency.create') }}">Add Agency</a>
        <table id="agenciesTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($agencies as $agency)
            <tr>
                <td>{{ $agency->id }}</td>
                <td>{{ $agency->name }}</td>
                <td>{{ $agency->email }}</td>
                <td>
                    <a href="{{ route('agency.show', $agency->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('agency.edit', $agency->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('agency.destroy', $agency->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#agenciesTable').DataTable();
    });
</script>
@endsection