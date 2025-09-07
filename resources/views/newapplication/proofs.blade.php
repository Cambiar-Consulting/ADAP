@use('App\Models\Lookups\FileTypesLookup')
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-10 mx-auto">
        <div class="card">
                <div class="card-header">
                    Proofs
                </div>
                <div class="card-body">
                    <p>
                        Proof of residency is required. Residency can be documented with a copy of ONE of the following (showing your name and address). If you have a P.O. box where you receive your mail, you must include information documenting your physical address to document residency.
                    </p>
                    <ul>
                        <li>Pay stubs or bank statement with your name and address(within the past 90 days)</li>
                        <li>Current Notice of Decision from Medicaid</li>
                        <li>Fuel/utility bill (within the past 90 days)</li>
                        <li>Phone bill (within the past 90 days)</li>
                        <li>Rent receipt (within the past 90 days)</li>
                    </ul>
                    <p>
                        If you live with someone and have none of these itemsin your name, we need proof of their residency and a letterstating that you live with them.
                    </p>
                    <div class="h3">Proofs</div>
                    <p>
                        <ul>
                            <li><a href="{{ route('files.create', ['application_id' => $newApplication->id, 'application_type_id' => $newApplication->application_type_id, 'file_type_id' => FileTypesLookup::PROOFOFRESIDENCY ]) }}">Add Proof of Residency (required)</a></li>
                            <li><a href="{{ route('files.create', ['application_id' => $newApplication->id, 'application_type_id' => $newApplication->application_type_id, 'file_type_id' => FileTypesLookup::PROOFOFINCOME]) }}">Add Proof of Income</a></li>
                            <li><a href="{{ route('files.create', ['application_id' => $newApplication->id, 'application_type_id' => $newApplication->application_type_id, 'file_type_id' => FileTypesLookup::PROOFOFINSURANCE]) }}">Add Proof of Insurance</a></li>
                        </ul>
                    </p>
                    <div class="row mb-5 pb-5 mt-2">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-10">
                            <table class="table table-hover table-sm table-bordered" style="width:100%">
                                <thead class="thead-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Type</th>
                                        <th>Created</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($files as $file)
                                    <tr>
                                        <td>{{ $file->id }}</td>
                                        <td>{{ $file->type->name }}</td>
                                        <td>{{ $file->createdDate }}</td>
                                        <td>
                                            {{-- {{ html()->form('DELETE', route('files.destroy', $file->id, false))->class('form-inline')->open() }}
                                                <a class="btn btn-sm btn-primary mr-2" href="{{ route('files.edit', $file) }}">Edit</a>
                                                <input type="submit" value="Delete" class="btn btn-sm btn-danger" onclick="return (confirm('Are you sure you want to delete this file?'));" />
                                            {{ html()->form()->close() }} --}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-1">
                        </div>
                    </div>
                </div>                
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-3">
                            <a class="btn btn-primary float-left" href="{{ route('newapplication.alternate', $newApplication) }}" onclick="return(confirm('Changes on this page will be lost if return to the previous page. Do you want to proceed?'));">Previous</a>
                        </div>
                        <div class="col-md-6">
                            <nav>
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled"><a class="page-link">1</a></li>
                                    <li class="page-item disabled"><a class="page-link">2</a></li>
                                    <li class="page-item disabled"><a class="page-link">3</a></li>
                                    <li class="page-item disabled"><a class="page-link">4</a></li>
                                    <li class="page-item disabled"><a class="page-link">5</a></li>
                                    <li class="page-item active"><a class="page-link">6</a></li>
                                    <li class="page-item disabled"><a class="page-link">7</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-md-3">
                            {{ html()->modelForm($newApplication, 'PUT', route('newapplication.saveproofs'))->open() }}
                                {{ html()->hidden('id') }}
                                <input type="submit" name="SaveAndNext" id="SaveAndNext" class="btn btn-primary float-right" value="Save and Next" />
                            {{ html()->closeModelForm() }}
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
    $('table').DataTable({
        "lengthChange": false,
        "ordering": false,
        "searching": false,
        "paging" : false,
        "info": false
    });
});
</script>
@endsection