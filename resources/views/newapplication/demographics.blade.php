@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-10 mx-auto">
        <div class="card">
            {{ html()->modelForm($newApplication, 'POST', route('newapplication.savedemographic', $newApplication))->id("demographics")->open() }}
            {{ html()->hidden('id') }}
            <div class="card-header">
                Applicant Information
            </div>
            <div class="card-body">
                <div class="form-group">
                    {{ html()->label('First Name')->for('first_name') }}
                    {{ html()->text('first_name')->class('form-control required') }}
                </div>
                <div class="form-group">
                    {{ html()->label('Middle Name')->for('middle_name') }}
                    {{ html()->text('middle_name')->class('form-control') }}
                </div>
                <div class="form-group">
                    {{ html()->label('Last Name ')->for('last_name') }}
                    {{ html()->text('last_name')->class('form-control required') }}
                </div>
                <div class="form-group">
                    {{ html()->label('Other Name(s) Used')->for('alias') }}
                    {{ html()->text('alias')->class('form-control') }}
                </div>
                <div class="form-group">
                    {{ html()->label('Date of Birth')->for('date_of_birth') }}
                    {{
                    html()->text('date_of_birth')->placeholder('MM/DD/YYYYY')->class('form-control  required')->data('inputmask', "'mask': '99/99/9999'")->value(old('date_of_birth', $newApplication->date_of_birth == null ? '' : $newApplication->date_of_birth->format('m/d/Y'))) }}
                </div>
                <div class="form-group">
                    {{ html()->label('Social Security Number')->for('ssn') }}
                    {{ html()->text('ssn')->class('form-control required')->data('inputmask', "'mask': '999-99-9999'") }}
                </div>
                <div class="form-group">
                    {{ html()->label('Email')->for('email') }}
                    {{ html()->text('email')->class('form-control') }}
                </div>
                <div class="form-group">
                    {{ html()->label('Gender (Select all that apply):')->for('gender') }}
                    <br />
                    {{ html()->select("genders")->multiple()->class('selectpicker from-control')->data('width',
                    '50%')->options($genders)->value(old('genders', $newApplication->genders->pluck('id'))) }}
                </div>
                <div class="form-group">
                    {{ html()->label('Race:')->for('races') }}
                    <br />
                    {{ html()->select("races")->multiple()->class('selectpicker from-control')->data('width',
                    '50%')->options($races)->value(old('races', $newApplication->races->pluck('id'))) }}
                </div>
                <div class="form-group">
                    {{ html()->label('Other Race:')->for('race_other') }}
                    {{ html()->text('race_other')->class('form-control') }}
                </div>
                <div class="form-group">
                    {{ html()->label('Ethnicity:')->for('ethnicity') }}
                    <br />
                    {{ html()->select("ethnicities")->multiple()->class('selectpicker from-control')->data('width',
                    '50%')->options($ethnicities)->value(old('ethnicities', $newApplication->ethnicities->pluck('id')))
                    }}
                </div>
                <div class="form-group">
                    {{ html()->label('Language Preference:')->for('languages') }}
                    <br />
                    {{ html()->select("languages")->multiple()->class('selectpicker from-control')->data('width',
                    '50%')->options($languages)->value(old('languages', $newApplication->languages->pluck('id'))) }}
                </div>
                <div class="form-group">
                    {{ html()->label('Other Language:')->for('language_other') }}
                    {{ html()->text('language_other')->class('form-control') }}
                </div>
                <div class="form-group">
                    <p>Do you require language assistance services?</p>
                    {{ html()->yesNoRadio('language_services', $newApplication) }}
                </div>
                <div class="form-group">
                    {{ html()->label('Marital Status')->for('marital_statuses') }}
                    <br />
                    {{ html()->select("marital_statuses")->multiple()->class('selectpicker from-control')->data('width', '50%')->options($marital_statuses)->value(old('marital_statuses', $newApplication->maritalStatuses->pluck('id'))) }}
                </div>
                <div class="form-group">
                    Living Arrangement:
                    @foreach($livingArrangements as $arrangement)
                        <div class="form-check">
                            {{ html()->radio('living_arrangement_id')->class('form-check-input')->id('living_arrangement_' . $arrangement->id)->value($arrangement->id)->checked(old('living_arrangement_id') == $arrangement->id || (old('living_arrangement_id') == null && $newApplication->living_arrangement_id === $arrangement->id)) }}
                            {{ html()->label($arrangement->name)->for('living_arrangement_' . $arrangement->id)->class('form-check-label') }}
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6">
                        <nav>
                            <ul class="pagination justify-content-center">
                                <li class="page-item active"><a class="page-link">1</a></li>
                                <li class="page-item disabled"><a class="page-link">2</a></li>
                                <li class="page-item disabled"><a class="page-link">3</a></li>
                                <li class="page-item disabled"><a class="page-link">4</a></li>
                                <li class="page-item disabled"><a class="page-link">5</a></li>
                                <li class="page-item disabled"><a class="page-link">6</a></li>
                                <li class="page-item disabled"><a class="page-link">7</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-3">
                        {{ html()->button("Save and Next")->type("submit")->class("btn btn-primary float-right") }}
                    </div>
                </div>
            </div>
            {{ html()->closeModelForm() }}
        </div>
    </div>
</div>
@endsection

@section('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\NewApplication\DemographicRequest', '#demographics'); !!}
@endsection