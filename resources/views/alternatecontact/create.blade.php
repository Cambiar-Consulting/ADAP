@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-10 mx-auto">
        <div class="card">
            {{ html()->modelForm($newApplication, 'POST', route('newapplication.alternatecontacts.store', $newApplication))->open() }}
                {{ html()->hidden('id') }}
                <div class="card-header">
                    Alternate Contact
                </div>
                <div class="card-body">
                    <div class="form-group">
                        {{ html()->label('Name *')->for('name') }}
                        {{ html()->text('name')->class('form-control') }}
                    </div>
                    <div class="form-group">
                        {{ html()->label('Organization')->for('organization') }}
                        {{ html()->text('organization')->class('form-control') }}
                    </div>
                    <div class="form-group">
                        {{ html()->label('Relationship')->for('relationship') }}
                        {{ html()->text('relationship')->class('form-control') }}
                    </div>
                    <div class="form-group">
                        {{ html()->label('Phone Number')->for('phone') }}
                        {{ html()->text('phone')->class('form-control') }}
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-3">
                            <a class="btn btn-primary float-left" href="{{ route('newapplication.alternate', $newApplication) }}" onclick="return(confirm('Changes on this page will be lost if return to the previous page. Do you want to proceed?'));">Previous</a>
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-3">
                            <input type="submit" name="SaveAndNext" class="btn btn-primary float-right" value="Save Contact" />
                        </div>
                    </div>
                </div>
            {{ html()->form()->close() }}
        </div>
    </div>
</div>
@endsection