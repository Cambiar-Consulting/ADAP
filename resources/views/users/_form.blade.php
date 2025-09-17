<div class="card-body">
    <div class="form-group">
        {{ html()->label('Username')->for('username') }}
        @can('updateUsername', \Auth::user())
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
        {{ html()->bootText(name: 'alias', required: false) }}
    </div>
    <div class="form-group">
        {{ html()->bootText(name: 'email', required: false) }}
    </div>
    <div class="form-group">
        {{ html()->bootPhone(name: 'phone_number', required: false) }}
    </div>
    <div class="form-group">
        {{ html()->bootDate(name: 'date_of_birth', required: true) }}
    </div>
    <div class="form-group">
        {{ html()->bootSSN(name: 'ssn', labelName: 'Social Security Number', required: false) }}
    </div>
    @if(isset($user))
        <div class="form-group">
            {{ html()->label('Is Stub Record')->for('is_stub') }}
            {{ html()->text('is_stub')->value($user->is_stub ? 'Yes' : 'No')->class('form-control')->disabled() }}
        </div>
    @endif
</div>
