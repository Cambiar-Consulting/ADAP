@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-10 mx-auto">
        <div class="card">
            <div class="card-header">
                Contact Information
            </div>
            <div class="card-body">
                <p>Add at least one address and phone number to continue to the next section.</p>
                <div class="row">
                    <div class="col-md-9">
                        <div class="h2">Addresses</div>
                    </div>
                    <div class="col-md-3 text-right">
                        <a class="btn btn-primary" href="{{ route('newapplication.addresses.create', $newApplication) }}">Add Address</a>
                    </div>
                </div>
                <div class="row mb-5 pb-5 mt-2">
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-10">
                        <table class="table table-hover table-sm table-bordered" style="width:100%">
                            <thead class="thead-light">
                                <tr>
                                    <th>Street</th>
                                    <th>Apt No</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Zipcode</th>
                                    <th>Can Contact</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($newApplication->addresses as $address)
                                <tr>
                                    <td>{{ $address->street }}</td>
                                    <td>{{ $address->apt_no }}</td>
                                    <td>{{ $address->city }}</td>
                                    <td>{{ $address->state }}</td>
                                    <td>{{ $address->zipcode }}</td>
                                    <td>{{ $address->can_contact ? 'Yes' : 'No' }}</td>
                                    <td>
                                        {{ html()->form('DELETE', route('addresses.destroy', $address))->class('form-inline')->open() }}
                                            <a class="btn btn-sm btn-primary mr-2" href="{{ route('addresses.edit', $address) }}">Edit</a>
                                            <input type="submit" value="Delete" class="btn btn-sm btn-danger" onclick="return (confirm('Are you sure you want to delete this address?'));" />
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
                <div class="row">
                    <div class="col-md-9">
                        <div class="h2">Phone Numbers</div>
                    </div>
                    <div class="col-md-3 text-right">
                        <a class="btn btn-primary" href="{{ route('newapplication.phonenumbers.create', $newApplication) }}">Add Phone Number</a>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-10">
                        <table id="example" class="table table-hover table-sm table-bordered" style="width:100%">
                            <thead class="thead-light">
                                <tr>
                                    <th>Number</th>
                                    <th>Type</th>
                                    <th>Can Contact</th>
                                    <th>Actions</th>
                                </tr>
                                
                            </thead>
                            <tbody>
                                @foreach ($newApplication->phoneNumbers as $phone)
                                <tr>
                                    <td>{{ $phone->number }}</td>
                                    <td>{{ $phone->type->name }}</td>
                                    <td>{{ $phone->can_contact ? 'Yes' : 'No' }}</td>
                                    <td>
                                        {{ html()->form('DELETE', route('phonenumbers.destroy', $phone))->class('form-inline')->open() }}
                                            <a class="btn btn-sm btn-primary mr-2" href="{{ route('phonenumbers.edit', $phone) }}">Edit</a>
                                            <input type="submit" value="Delete" class="btn btn-sm btn-danger" onclick="return (confirm('Are you sure you want to delete this phone number?'));" />
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
                        <a class="btn btn-primary float-left"
                            href="{{ route('newapplication.demographic', $newApplication) }}"
                            onclick="return(confirm('Changes on this page will be lost if return to the previous page. Do you want to proceed?'));">Previous</a>
                    </div>
                    <div class="col-md-6">
                        <nav>
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled"><a class="page-link">1</a></li>
                                <li class="page-item active"><a class="page-link">2</a></li>
                                <li class="page-item disabled"><a class="page-link">3</a></li>
                                <li class="page-item disabled"><a class="page-link">4</a></li>
                                <li class="page-item disabled"><a class="page-link">5</a></li>
                                <li class="page-item disabled"><a class="page-link">6</a></li>
                                <li class="page-item disabled"><a class="page-link">7</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-3">
                        {{ html()->modelForm($newApplication, 'POST', route('newapplication.savecontact'))->open() }}
                            {{ html()->hidden('id') }}
                            <input type="submit" name="SaveAndNext" id="SaveAndNext" class="btn btn-primary float-right" value="Save and Next" />
                        {{ html()->form()->close() }}
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