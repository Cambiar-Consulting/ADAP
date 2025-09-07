@use('App\Models\Lookups\ApplicationStatusesLookup')
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-10 mx-auto">
        <h3>Applicant Home</h3>
        @if($coverageStartDate != null && $coverageEndDate != null)
            <div class="alert alert-success">
                <p>You are currently in ADAP coverage: {{ $coverageStartDate->format('m/d/Y') }} - {{ $coverageEndDate->format('m/d/Y') }}</p>
            </div>
        @endif
        @can('create', App\Models\NewApplication::class)
            <div class="card mb-5">
                <div class="card-header">
                    Create New Application
                </div>
                <div class="card-body">
                    <p class="card-text">Create a new application to enroll into ADAP.</p>
                    {{ html()->a()->class('btn btn-success')->text('Start a New Application')->href(route('newapplication.initiate')) }}
                </div>
            </div>
        @endcan
        @if ($openNewApplication != null)
            <div class="card mb-5">
                <div class="card-header">
                    Continue New Application
                </div>
                <div class="card-body">
                    @if ($openNewApplication->application_status_id == ApplicationStatusesLookup::INPROGRESS)
                        <p class="card-text">Continue your New Application.</p>
                        {{ html()->a()->text('Continue New Application')->href(route('newapplication.demographic', $openNewApplication->application_id))->class('btn btn-success') }}
                    @elseif ($openNewApplication->application_status_id == ApplicationStatusesLookup::MODIFICATIONREQUIRED)
                        <p class="card-text">Your submitted application needs modifications. See the notes from the reviewer:</p>
                        @if ($openNewApplication->currentStatus->notes != null)
                            <p class="ml-5">{{ $openNewApplication->currentStatus->notes }}</p>
                        @else
                            <p class="ml-5">No notes</p>
                        @endif
                        <a class="btn btn-success" href="{{ route('newapplication.demographic', $openNewApplication->application_id) }}">Complete required changes</a>
                    @endif
                </div>
            </div>
        @endif

        <h3 class="mt-5">Submitted New Applications</h3>
        <table id="submittedApplications" class="table table-striped table-bordered">
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
                @foreach ($submittedNewApplications as $app)
                    <tr>
                        <td>{{ $app->applicant->fullName }}</td>
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

{{--         
        <h3 class="mt-5">Closed Applications</h3>
        <table id="closedApplications" class="table table-striped table-bordered">
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
                @foreach ($closedNewApplications as $app)
                    <tr>
                        <td>@(app.Applicant.FirstName) @(app.Applicant.LastName)</td>
                        <td>New Application</td>
                        <td>@(app.ApplicationStatus)</td>
                        <td data-sort="@(app.NewApplicationStatusHistory.CreatedOn.Value.ToString("O"))">@(app.NewApplicationStatusHistory.CreatedOn)</td>
                        <td><a class="btn btn-primary" asp-controller="NewApplication" asp-action="Review" asp-route-id="@(app.Id)">View</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table> --}}
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