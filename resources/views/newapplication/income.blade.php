@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-10 mx-auto">
        <div class="card">
            <div class="card-header">
                Income of Applicant and Household Members
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <div class="h2">Households</div>
                    </div>
                    <div class="col-md-3 text-right">
                        <a class="btn btn-primary" href="{{ route('newapplication.households.create', $newApplication) }}">Add Household</a>
                    </div>
                </div>
                <div class="row mb-5 pb-5 mt-2">
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-10">
                        <table class="table table-hover table-sm table-bordered" style="width:100%">
                            <thead class="thead-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Date of Birth</th>
                                    <th>Relationship</th>
                                    <th>Income Source</th>
                                    <th>Gross Amount</th>
                                    <th>Frequency</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($newApplication->households as $household)
                                <tr>
                                    <td>{{ $household->name }}</td>
                                    <td>{{ $household->date_of_birth }}</td>
                                    <td>{{ $household->relationship }}</td>
                                    <td>{{ $household->income_source }}</td>
                                    <td>{{ $household->gross_amount }}</td>
                                    <td>{{ $household->payment_frequency->name }}</td>
                                    <td>
                                        {{ html()->form('DELETE', route('households.destroy', $household))->class('form-inline')->open() }}
                                            <a class="btn btn-sm btn-primary mr-2" href="{{ route('households.edit', $household) }}">Edit</a>
                                            <input type="submit" value="Delete" class="btn btn-sm btn-danger" onclick="return (confirm('Are you sure you want to delete this household?'));" />
                                        {{ html()->form()->close() }}
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
                        <a class="btn btn-primary float-left" href="{{ route('newapplication.insurance', $newApplication) }}" onclick="return(confirm('Changes on this page will be lost if return to the previous page. Do you want to proceed?'));">Previous</a>
                    </div>
                    <div class="col-md-6">
                        <nav>
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled"><a class="page-link">1</a></li>
                                <li class="page-item disabled"><a class="page-link">2</a></li>
                                <li class="page-item disabled"><a class="page-link">3</a></li>
                                <li class="page-item active"><a class="page-link">4</a></li>
                                <li class="page-item disabled"><a class="page-link">5</a></li>
                                <li class="page-item disabled"><a class="page-link">6</a></li>
                                <li class="page-item disabled"><a class="page-link">7</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-3">
                        {{ html()->modelForm($newApplication, 'PUT', route('newapplication.saveincome'))->open() }}
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