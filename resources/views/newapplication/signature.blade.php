@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-10 mx-auto">
        <div class="card">
            {{ html()->modelForm($newApplication, 'PUT', route('newapplication.savesignature'))->open() }}
                {{ html()->hidden('id') }}
                <div class="card-header">
                    Signature
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
                    <div class="form-group">
                        <div class="form-check mb-5">
                            {{ html()->checkbox('signed')->class('form-check-input')->checked(old('signed') === '1' || $newApplication->signed_at != null) }}
                            {{ html()->label('I agree')->for('signed')->class('form-check-label') }}                       
                        </div>
                    </div>
                    <div class="form-group">
                        {{ html()->label("Any additional Notes to submit with your application?")->for('notes') }}
                        {{ html()->textarea('notes')->class('form-control')->rows(5) }}
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-3">
                            <a class="btn btn-primary float-left" href="{{ route('newapplication.contact', $newApplication) }}" onclick="return(confirm('Changes on this page will be lost if return to the previous page. Do you want to proceed?'));">Previous</a>                            
                        </div>
                        <div class="col-md-6">
                            <nav>
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled"><a class="page-link">1</a></li>
                                    <li class="page-item disabled"><a class="page-link">2</a></li>
                                    <li class="page-item disabled"><a class="page-link">3</a></li>
                                    <li class="page-item disabled"><a class="page-link">4</a></li>
                                    <li class="page-item disabled"><a class="page-link">5</a></li>
                                    <li class="page-item disabled"><a class="page-link">6</a></li>
                                    <li class="page-item active"><a class="page-link">7</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-md-3">
                            <input type="submit" name="SaveAndNext" id="SaveAndNext" class="btn btn-primary float-right" value="Save and Submit Application" />
                        </div>
                    </div>
                </div>
            {{ html()->closeModelForm() }}
        </div>
    </div>
</div>
@endsection

@section('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\NewApplication\SignatureRequest', 'form'); !!}
@endsection