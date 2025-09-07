@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-10 mx-auto">
        <div class="card">
            {{ html()->form('POST', route('files.store'))->acceptsFiles()->open() }}
                {{ html()->hidden('application_id')->value(request()->application_id) }}
                {{ html()->hidden('application_type_id')->value(request()->application_type_id) }}
                <div class="card-header">
                    File Upload
                </div>
                <div class="card-body">
                    <div class="form-group">
                        {{ html()->label("File Upload")->for('file') }}
                        {{ html()->file('file')->class('form-control') }}
                    </div>
                    <div class="form-group">
                        {{ html()->label('File Type:')->for('file_type_id') }}
                        <br />
                        {{ html()->select("file_type_id")->class('selectpicker from-control')->data('width', '50%')->options($file_types)->value(old('file_type_id', request()->file_type_id)) }}
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-3">
                            <a class="btn btn-primary float-left" href="{{ route('newapplication.proofs', request()->application_id) }}" onclick="return(confirm('Changes on this page will be lost if return to the previous page. Do you want to proceed?'));">Previous</a>
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-3">
                            <input type="submit" name="SaveAndNext" class="btn btn-primary float-right" value="Upload File" />
                        </div>
                    </div>
                </div>
            {{ html()->form()->close() }}
        </div>
    </div>
</div>
@endsection