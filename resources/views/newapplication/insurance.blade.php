@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-10 mx-auto">
        <div class="card">
            {{ html()->modelForm($newApplication, 'PUT', route('newapplication.saveinsurance'))->open() }}
                {{ html()->hidden('id') }}
                <div class="card-header">
                    Health Care Coverage
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <p>Do you have other health care coverage? (Private Policy, HMO, Union, Retirement, Medicare or Other Health Plan)</p>
                        <div class="form-check form-check-inline">
                            {{ html()->radio('other_health_coverage')->class('form-check-input')->id('other_health_coverage_yes')->value(1)->checked(old('other_health_coverage') === '1' || $newApplication->other_health_coverage === 1) }}
                            {{ html()->label('Yes')->for('other_health_coverage_yes')->class('form-check-label') }}
                        </div>
                        <div class="form-check form-check-inline">
                            {{ html()->radio('other_health_coverage')->class('form-check-input')->id('other_health_coverage_no')->value(0)->checked(old('other_health_coverage') === '0' || $newApplication->other_health_coverage === 0) }}
                            {{ html()->label('No')->for('other_health_coverage_no')->class('form-check-label') }}
                        </div>
                    </div>
                    <div class="form-group">
                        If Medicare, what types(s)?<br />
                        {{ html()->select("medicares")->multiple()->class('selectpicker from-control')->data('width', '50%')->options($medicares)->value(old('medicares', $newApplication->medicares->pluck('id'))) }}
                    </div>
                    <div class="form-group">
                        <p>Do you pay health insurance premiums?</p>
                        <div class="form-check form-check-inline">
                            {{ html()->radio('health_insurance_premiums')->class('form-check-input')->id('health_insurance_premiums' . '_yes')->value(1)->checked(old('health_insurance_premiums') === '1' || $newApplication->health_insurance_premiums === 1) }}
                            {{ html()->label('Yes')->for('health_insurance_premiums' . '_yes')->class('form-check-label') }}
                        </div>
                        <div class="form-check form-check-inline">
                            {{ html()->radio('health_insurance_premiums')->class('form-check-input')->id('health_insurance_premiums' . '_no')->value(0)->checked(old('health_insurance_premiums') === '0' || $newApplication->health_insurance_premiums === 0) }}
                            {{ html()->label('No')->for('health_insurance_premiums' . '_no')->class('form-check-label') }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ html()->label('If you have Medicaid with a spenddown, enter spenddown amount:')->for('medicaid_spenddown') }}
                        {{ html()->text('medicaid_spenddown')->class('form-control') }}
                    </div>
                    <div class="form-group">
                        {{ html()->label('If you were denied Medicaid, give the reason:')->for('medicaid_denial') }}
                        {{ html()->text('medicaid_denial')->class('form-control') }}
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-3">
                            <a class="btn btn-primary float-left" href="{{ route('newapplication.proofs', $newApplication) }}" onclick="return(confirm('Changes on this page will be lost if return to the previous page. Do you want to proceed?'));">Previous</a>
                        </div>
                        <div class="col-md-6">
                            <nav>
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled"><a class="page-link">1</a></li>
                                    <li class="page-item disabled"><a class="page-link">2</a></li>
                                    <li class="page-item active"><a class="page-link">3</a></li>
                                    <li class="page-item disabled"><a class="page-link">4</a></li>
                                    <li class="page-item disabled"><a class="page-link">5</a></li>
                                    <li class="page-item disabled"><a class="page-link">6</a></li>
                                    <li class="page-item disabled"><a class="page-link">7</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-md-3">
                            <input type="submit" name="SaveAndNext" id="SaveAndNext" class="btn btn-primary float-right" value="Save and Next" />
                        </div>
                    </div>
                </div>
            {{ html()->closeModelForm() }}
        </div>
    </div>
</div>
@endsection

@section('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\NewApplication\IncomeRequest', 'form'); !!}
@endsection