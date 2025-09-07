@extends('layouts.app')

@section('content')
{{ html()->modelForm($newApplication) }}
<div class="row">
    <div class="col-10 mx-auto">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $newApplication->applicant->first_name }} {{ $newApplication->applicant->last_name }} - New Application</li>
            </ol>
        </nav>
        <div class="card mb-5">
            <div class="card-header text-white bg-secondary" aria-expanded="true">
                Sections
            </div>
            <div class="list-group list-group-flush">
                <a href="#ApplicantInformation" class="list-group-item list-group-item-action">Applicant Information</a>
                <a href="#ContactInformation" class="list-group-item list-group-item-action">Contact Information</a>
                <a href="#HealthCareCoverage" class="list-group-item list-group-item-action">Health Care Coverage</a>
                <a href="#IncomeOfApplicant" class="list-group-item list-group-item-action">Income of Applicant and Household Members</a>
                <a href="#AlternateContact" class="list-group-item list-group-item-action">Alternate Contact(s)</a>
                <a href="#Proofs" class="list-group-item list-group-item-action">Proofs</a>
                <a href="#Signature" class="list-group-item list-group-item-action">Signature</a>
                @can('review', $newApplication)
                    <a href="#StatusHistory" class="list-group-item list-group-item-action">Status History</a>
                    <a href="#Approval" class="list-group-item list-group-item-action">Approval</a>
                @endcan
            </div>
        </div>
        <div class="card mb-5">
            <div class="card-header text-white bg-secondary" data-toggle="collapse" data-target="#ApplicantInformation" aria-expanded="true" aria-controls="ApplicantInformation">
                <a id="ApplicantInformation">Applicant Information</a>
            </div>
            <div class="card-body collapse show" id="ApplicantInformation">
                <div class="form-group">
                    {{ html()->label('First Name')->for('first_name') }}
                    {{ html()->text('first_name')->class('form-control')->disabled() }}
                </div>
                <div class="form-group">
                    {{  html()->label('Middle Name')->for('middle_name')  }}
                    {{ html()->text('middle_name')->class('form-control')->disabled() }}
                </div>
                <div class="form-group">
                    {{ html()->label('Last Name')->for('last_name') }}
                    {{ html()->text('last_name')->class('form-control')->disabled() }}
                </div>
                <div class="form-group">
                    {{ html()->label('Other Name(s) Used')->for('alias') }}
                    {{ html()->text('alias')->class('form-control')->disabled() }}
                </div>
                <div class="form-group">
                    {{ html()->label('Date of Birth')->for('date_of_birth') }}
                    {{ html()->text('date_of_birth')->class('form-control')->value($newApplication->date_of_birth == null ? '' : $newApplication->date_of_birth->format('m/d/Y'))->disabled() }}
                </div>
                <div class="form-group">
                    {{ html()->label('Social Security Number ')->for('ssn') }}
                    {{ html()->text('ssn')->class('form-control')->disabled() }}
                </div>
                <div class="form-group">
                    {{ html()->label('Email')->for('email') }}
                    {{ html()->text('email')->class('form-control')->disabled() }}
                </div>
                <div class="form-group">
                    Gender (Select all that apply):
                    @foreach ($genders as $gender)
                        @if ($newApplication->genders->contains($gender))
                            <br /><i class="far fa-check-square"></i> {{ $gender->name }}
                        @else
                            <br /><i class="far fa-square"></i> {{ $gender->name }}
                        @endif
                    @endforeach
                </div>
                <div class="form-group">
                    Race:
                    @foreach ($races as $race)
                        @if ($newApplication->races->contains($race))
                            <br /><i class="far fa-check-square"></i> {{ $race->name }}
                        @else
                            <br /><i class="far fa-square"></i> {{ $race->name }}
                        @endif
                    @endforeach
                    {{ html()->label('Other Race:')->for('race_other') }}
                    {{ html()->text('race_other')->class('form-control')->disabled() }}
                </div>
                <div class="form-group">
                    Ethnicity:
                    @foreach ($ethnicities as $ethnicity)
                        @if ($newApplication->ethnicities->contains($ethnicity))
                            <br /><i class="far fa-check-square"></i> {{ $ethnicity->name }}
                        @else
                            <br /><i class="far fa-square"></i> {{ $ethnicity->name }}
                        @endif
                    @endforeach
                </div>
                <div class="form-group">
                    Language Preference:
                    @foreach ($languages as $language)
                        @if ($newApplication->languages->contains($language))
                            <br /><i class="far fa-check-square"></i> {{ $language->name }}
                        @else
                            <br /><i class="far fa-square"></i> {{ $language->name }}
                        @endif
                    @endforeach
                    <br />
                    {{ html()->label('Other Language:')->for('language_other') }}
                    {{ html()->text('language_other')->class('form-control')->disabled() }}
                </div>
                <div class="form-group">
                    <p>Do you require language assistance services?</p>
                    @if ($newApplication->language_services == 1)
                        <i class="far fa-check-square"></i> Yes
                    @else
                        <i class="far fa-square"></i> Yes
                    @endif
                    <br />
                    @if ($newApplication->language_services == 0)
                        <i class="far fa-check-square"></i> No
                    @else
                        <i class="far fa-square"></i> No
                    @endif
                </div>
                <div class="form-group">
                    Marital Status:
                    @foreach ($maritalStatuses as $maritalStatus)
                        @if ($newApplication->maritalStatuses->contains($maritalStatus))
                            <br /><i class="far fa-check-square"></i> {{ $maritalStatus->name }}
                        @else
                            <br /><i class="far fa-square"></i> {{ $maritalStatus->name }}
                        @endif
                    @endforeach
                </div>
                <div class="form-group">
                    Living Arrangement:
                    @foreach ($livingArrangements as $livingArrangement)
                        @if ($newApplication->livingArrangement == $livingArrangement)
                            <br /><i class="far fa-check-square"></i> {{ $livingArrangement->name }}
                        @else
                            <br /><i class="far fa-square"></i> {{ $livingArrangement->name }}
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        
        <div class="card mb-5">
            <div class="card-header text-white bg-secondary" data-toggle="collapse" data-target="#ContactInformation" aria-expanded="true" aria-controls="ContactInformation">
                <a id="ContactInformation">Contact Information</a>
            </div>
            <div class="card-body collapse show" id="ContactInformation">
                <h5 class="card-title">Addresses</h5>
                <div class="row">
                    @foreach ($newApplication->addresses as $address)
                        <div class="card col-5 mb-3 mx-3">
                            <div class="card-body">
                                <div class="row">
                                    {{ $address->street }}<br />
                                    @if ($address->apt_no != null)
                                        Apartment #{{ $address->apt_no }}<br />
                                    @endif
                                    {{ $address->city }}, {{ $address->state }} {{ $address->zipcode }}<br />
                                    Can Contact Address:
                                    @if ($address->can_contact)
                                        Yes
                                    @else
                                        No
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <h5 class="card-title">Phone Numbers</h5>
                <div class="row">
                    @foreach ($newApplication->phoneNumbers as $phoneNumber)
                        <div class="card col-5 mb-3 mx-3">
                            <div class="card-body">
                                <div class="row">
                                    {{ $phoneNumber->number }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>        
        <div class="card mb-5">
            <div class="card-header text-white bg-secondary">
                <a id="HealthCareCoverage">Health Care Coverage</a>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <p>Do you have other health care coverage? (Private Policy, HMO, Union, Retirement, Medicare or Other Health Plan)</p>
                    @if ($newApplication->other_health_coverage == true)
                        <i class="far fa-check-square"></i> Yes
                    @else
                        <i class="far fa-square"></i> Yes
                    @endif
                    <br />
                    @if ($newApplication->other_health_coverage == false)
                        <i class="far fa-check-square"></i> No
                    @else
                        <i class="far fa-square"></i> No
                    @endif
                </div>
                <div class="form-group">
                    If Medicare, what types(s)?
                    @foreach ($medicares as $medicare)
                        @if ($newApplication->medicares->contains($medicare))
                            <br /><i class="far fa-check-square"></i> {{ $medicare->name }}
                        @else
                            <br /><i class="far fa-square"></i> {{ $medicare->name }}
                        @endif
                    @endforeach
                </div>
                <div class="form-group">
                    <p>Do you pay health insurance premiums?</p>
                    @if ($newApplication->health_insurance_premiums == true)
                        <i class="far fa-check-square"></i> Yes
                    @else
                        <i class="far fa-square"></i> Yes
                    @endif
                    <br />
                    @if ($newApplication->health_insurance_premiums == false)
                        <i class="far fa-check-square"></i> No
                    @else
                        <i class="far fa-square"></i> No
                    @endif
                </div>
                <div class="form-group">
                    {{ html()->label('If you have Medicaid with a spenddown, enter spenddown amount:')->for('medicaid_spenddown') }}
                    {{ html()->text('medicaid_spenddown')->class('form-control')->disabled() }}
                </div>
                <div class="form-group">
                    {{ html()->label('If you were denied Medicaid, give the reason:')->for('medicaid_denial') }}
                    {{ html()->text('medicaid_denial')->class('form-control')->disabled() }}
                </div>
            </div>
        </div>

        <div class="card mb-5">
            <div class="card-header text-white bg-secondary">
                <a id="IncomeOfApplicant">Income of Applicant and Household Members</a>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($newApplication->households as $household)
                        <div class="card col-5 mb-3 mx-3">
                            <div class="card-body">
                                <div class="row">
                                    Household Member's Name: {{ $household->name }}<br />
                                    Date of Birth: {{ $household->date_of_birth }}<br />
                                    Relationship: {{ $household->relationship }} @<br />
                                    Income Source: {{ $household->income_source }}<br />
                                    Gross Amount: {{ $household->gross_amount }}<br />
                                    How Often: {{ $household->payment_frequency->name }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="card mb-5">
            <div class="card-header text-white bg-secondary">
                <a id="AlternateContact">Alternate Contact(s)</a>
            </div>
            <div class="card-body">
                <p>
                    By signing this application, I authorize the Uninsured Care Programsto speak with the following person(s) about my application (i.e. social worker, casemanager, familymember):
                </p>
                <div class="row">
                    @foreach ($newApplication->alternateContacts as $contact)
                        <div class="card col-5 mb-3 mx-3">
                            <div class="card-body">
                                <div class="row">
                                    Name: {{ $contact->name }}<br />
                                    Organization: {{ $contact->organization }}<br />
                                    Relationship: {{ $contact->relationship }}<br />
                                    Phone: {{ $contact->phone }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="card mb-5">
            <div class="card-header text-white bg-secondary">
                <a id="Proofs">Proofs</a>
            </div>
            <div class="card-body">
                <p>Proof of Insurance</p>
                <div class="row">
                    @foreach ($newApplication->files as $file)
                        <div class="card col-5 mb-3 mx-3">
                            <div class="card-body">
                                <div class="row">
                                    Name: {{ $file->file_name }}<br />
                                    Type: {{ $file->type->name }}<br />
                                    Size: {{ $file->file_size }} bytes<br />
                                </div>
                                <div class="row mt-2">
                                    <a class="btn btn-sm btn-success mr-2" href="{{ route('file.download', $file) }}">Download</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="card mb-5">
            <div class="card-header text-white bg-secondary">
                <a id="Signature">Signature</a>
            </div>
            <div class="card-body">
                <p>
                    I certify that all the information in this application is true and correct and that I am a New York State resident. I understand the following:
                </p>
                <p>
                    This information is being given in connection with the receipt of federal funds by the State of New York. Program officials will verify the information on this form. Program officials may periodically verify my Medicaid status and bill Medicaid as necessary.
                </p>
                <p>
                    If I deliberately misrepresent information on this application, I may be required to repay benefits provided tome and I may be prosecuted under applicable state and federal statutes.
                </p>
                <p>
                    I hereby apply for benefits under the Uninsured Care Programs and consent for my information to be used and disclosed as necessary for the purposes ofmy treatment, for payment of healthcare services, payment of health insurance premiums and for the healthcare operations for the Program.
                </p>
                @if ($newApplication->signed_at != null)
                    <i class="far fa-check-square"></i> I agree
                @else
                    <i class="far fa-square"></i> I agree
                @endif
                <p>
                    Any additional Notes to submit with your application?
                </p>
                <textarea class="form-control"></textarea>
            </div>
        </div>
        {{ html()->closeModelForm() }}
        @can('review', $newApplication)
            @include('newapplication._status')
        @endcan
    </div>
</div>

@endsection