@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-10 mx-auto">
        <div class="card">
            {{ html()->modelForm($phonenumber, 'PUT', route('phonenumbers.update', $phonenumber))->open() }}
                {{ html()->hidden('id') }}
                <div class="card-header">
                    Phone Number
                </div>
                <div class="card-body">
                    <div class="form-group">
                        {{ html()->label('Phone Number *')->for('number') }}
                        {{ html()->text('number')->class('form-control') }}
                    </div>
                    <div class="form-group">
                        Phone Type:
                        @foreach($phoneNumberTypes as $type)
                            <div class="form-check">
                                {{ html()->radio('phone_number_type_id')->class('form-check-input')->id('phone_number_type_id_' . $type->id)->value($type->id)->checked(old('phone_number_type', $phonenumber->phone_number_type_id === $type->id)) }}
                                {{ html()->label($type->name)->for('phone_number_type_id_' . $type->id)->class('form-check-label') }}
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <p>Can we leave a message?</p>
                        <div class="form-check form-check-inline">
                            {{ html()->radio('can_contact')->class('form-check-input')->id('can_contact_yes')->value(1)->checked(old('can_contact') === '1' || $phonenumber->can_contact === 1) }}
                            {{ html()->label('Yes')->for('can_contact_yes')->class('form-check-label') }}
                        </div>
                        <div class="form-check form-check-inline">
                            {{ html()->radio('can_contact')->class('form-check-input')->id('can_contact_no')->value(0)->checked(old('can_contact') === '0' || $phonenumber->can_contact === 0) }}
                            {{ html()->label('No')->for('can_contact_no')->class('form-check-label') }}
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-3">
                            <a class="btn btn-primary float-left" href="{{ route('newapplication.contact', $phonenumber->newapplication) }}" onclick="return(confirm('Changes on this page will be lost if return to the previous page. Do you want to proceed?'));">Previous</a>
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-3">
                            <input type="submit" name="SaveAndNext" class="btn btn-primary float-right" value="Save Phone Number" />
                        </div>
                    </div>
                </div>
            {{ html()->form()->close() }}
        </div>
    </div>
</div>
@endsection