<div class="card-body">
    <div class="form-group">
        {{ html()->label('Username')->for('username') }}
        @can('updateUsername', $user)
            {{ html()->text('username')->class('form-control')  }}
        @else
            {{ html()->text('username')->class('form-control')->disabled()  }}
        @endcan
    </div>
    <div class="form-group">
        {{ html()->bootText(name: 'first_name', required: true) }}
    </div>
    <div class="form-group">
        {{ html()->bootText(name: 'middle_name', required: false) }}
    </div>
    <div class="form-group">
        {{ html()->bootText(name: 'last_name', required: true) }}
    </div>
    <div class="form-group">
        {{ html()->bootText(name: 'alias', required: true) }}
    </div>
    <div class="form-group">
        {{ html()->bootText(name: 'email', required: true) }}
    </div>
    <div class="form-group">
        {{ html()->bootPhone(name: 'phone_number', required: true) }}
    </div>
    <div class="form-group">
        {{ html()->bootDate(name: 'date_of_birth', required: true) }}
    </div>
    <div class="form-group">
        {{ html()->bootSSN(name: 'ssn', labelName: 'Social Security Number', required: false) }}
    </div>
    <div class="form-group">
        {{ html()->label('Is Stub Record')->for('is_stub') }}
        {{ html()->text('is_stub')->value($user->is_stub ? 'Yes' : 'No')->class('form-control')->disabled() }}
    </div>
</div>
<div class="card-footer">
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
        </div>
        <div class="col-md-3">
            <input type="submit" name="SaveAndNext" id="SaveAndNext" class="btn btn-primary float-right"
                value="Update Profile" />
        </div>
    </div>
</div>