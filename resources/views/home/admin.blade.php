@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-10 mx-auto">
        <h3>Admin Home</h3>

        <h3 class="mt-5">Applications</h3>
        <table id="" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Applicant</th>
                    <th>Application Type</th>
                    <th>Status</th>
                    <th>Status Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($applications as $app)
                    <tr>
                        <td>{{ $app->applicant->full_name() }}</td>
                        <td>New Application</td>
                        <td>{{ $app->application_status }}</td>
                        <td data-sort="">{{ $app->createdDate }}</td>
                        <td>
                            {{ html()->a()->class('btn btn-primary')->href(route('newapplication.review', $app->application_id))->text('View') }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
$(document).ready(function () {
    $('table').DataTable({
        "lengthChange": false,
        "order": [[ 3, "desc" ]]
    });
});
</script>
@endsection