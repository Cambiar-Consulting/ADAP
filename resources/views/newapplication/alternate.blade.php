@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-10 mx-auto">
        <div class="card">
            <div class="card-header">
                Alternate Contact(s)
            </div>
            <div class="card-body">
                <p>
                    By signing this application, I authorize the Uninsured Care Programsto speak with the following person(s) about my application (i.e. social worker, casemanager, familymember):
                </p>
                <p>
                    <a class="btn btn-primary" href="{{ route('newapplication.alternatecontacts.create', $newApplication) }}">Add Alternate Contact</a>
                </p>
                <div class="row mb-5 pb-5 mt-2">
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-10">
                        <table class="table table-hover table-sm table-bordered" style="width:100%">
                            <thead class="thead-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Organization</th>
                                    <th>Relationship</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($newApplication->alternateContacts as $contact)
                                <tr>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->organization }}</td>
                                    <td>{{ $contact->relationship }}</td>
                                    <td>{{ $contact->phone }}</td>
                                    <td>
                                        {{ html()->form('DELETE', route('alternatecontacts.destroy', $contact))->class('form-inline')->open() }}
                                            <a class="btn btn-sm btn-primary mr-2" href="{{ route('alternatecontacts.edit', $contact) }}">Edit</a>
                                            <input type="submit" value="Delete" class="btn btn-sm btn-danger" onclick="return (confirm('Are you sure you want to delete this contact?'));" />
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
                        <a class="btn btn-primary float-left" href="{{ route('newapplication.income', $newApplication) }}" onclick="return(confirm('Changes on this page will be lost if return to the previous page. Do you want to proceed?'));">Previous</a>
                    </div>
                    <div class="col-md-6">
                        <nav>
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled"><a class="page-link">1</a></li>
                                <li class="page-item disabled"><a class="page-link">2</a></li>
                                <li class="page-item disabled"><a class="page-link">3</a></li>
                                <li class="page-item disabled"><a class="page-link">4</a></li>
                                <li class="page-item active"><a class="page-link">5</a></li>
                                <li class="page-item disabled"><a class="page-link">6</a></li>
                                <li class="page-item disabled"><a class="page-link">7</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-3">
                        {{ html()->modelForm($newApplication, 'PUT', route('newapplication.savealternate'))->open() }}
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