@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-10 mx-auto">
        <div class="card">
            {{ html()->modelForm($household, 'PUT', route('households.update', $household))->open() }}
                {{ html()->hidden('id') }}
                <div class="card-header">
                    Household
                </div>
                <div class="card-body">
                    <div class="form-group">
                        {{ html()->label("Household Member's Name *")->for('name') }}
                        {{ html()->text('name')->class('form-control') }}
                    </div>
                    <div class="form-group">
                        {{ html()->label('Date of Birth')->for('date_of_birth') }}
                        {{ html()->text('date_of_birth')->class('form-control') }}
                    </div>
                    <div class="form-group">
                        {{ html()->label('Relationship')->for('relationship') }}
                        {{ html()->text('relationship')->class('form-control') }}
                    </div>
                    <div class="form-group">
                        {{ html()->label('Income Source')->for('income_source') }}
                        {{ html()->text('income_source')->class('form-control') }}
                    </div>
                    <div class="form-group">
                        {{ html()->label('Gross Amount')->for('gross_amount') }}
                        {{ html()->text('gross_amount')->class('form-control') }}
                    </div>
                    <div class="form-group">
                        How often?
                        @foreach($payment_frequencies as $frequency)
                            <div class="form-check">
                                {{ html()->radio('payment_frequency_id')->class('form-check-input')->id('payment_frequency_id_' . $frequency->id)->value($frequency->id)->checked(old('payment_frequency_id') == $frequency->id || (old('payment_frequency_id') == null && $household->payment_frequency_id === $frequency->id)) }}
                                {{ html()->label($frequency->name)->for('payment_frequency_id_' . $frequency->id)->class('form-check-label') }}
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-3">
                            <a class="btn btn-primary float-left" href="{{ route('newapplication.income', $household->newapplication) }}" onclick="return(confirm('Changes on this page will be lost if return to the previous page. Do you want to proceed?'));">Previous</a>
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-3">
                            <input type="submit" name="SaveAndNext" class="btn btn-primary float-right" value="Save Household" />
                        </div>
                    </div>
                </div>
            {{ html()->form()->close() }}
        </div>
    </div>
</div>
@endsection