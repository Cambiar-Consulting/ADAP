<div class="card mb-5">
    <div class="card-header text-white bg-secondary">
        <a id="StatusHistory">Status History</a>
    </div>
    <ul class="list-group list-group-flush">
        @foreach ($statusHistories as $status)
            <li class="list-group-item">
                {{ $status->application_status->name }} - At: {{ $status->created_date() }} - By: {{ $status->created_by ? $status->created_by->full_name : '' }}<br />
                Start Date: {{ $status->start_date() }} to End Date: {{ $status->end_date() }}<br />
                Notes: {{ $status->notes }}
            </li>
        @endforeach
    </ul>
</div>

<div class="card">
    {{ html()->form('POST', route('newapplication.savereview', $newApplication))->open() }}
        {{ html()->hidden('application_id', $newApplication->id) }}
        <div class="card-header text-white bg-secondary">
            <a id="Approval">Approval</a>
        </div>
        <div class="card-body">
            <div class="form-group">
                {{ html()->bootText(name: 'current_status', value: $currentStatus->name, labelName: 'Current Status', attributes: ['disabled' => 'disabled', 'class' => 'form-control']) }}
            </div>
            <div class="form-group">
                {{ html()->bootSelect(name: 'application_status_id', options: $availableStatuses, required: true, labelName: 'New Status') }}
            </div>
            <div class="form-group">
                {{ html()->bootDate('start_date') }}
            </div>
            <div class="form-group">
                {{ html()->bootDate('end_date') }}
            </div>
            <div class="form-group">
                {{ html()->bootTextArea(name: 'notes', attributes: ['rows' => 5]) }}
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-6">
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary float-right">Save and Next</button>
                </div>
            </div>
        </div>
    </form>
</div>