{{-- Success Alert --}}
@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible alert-solid alert-label-icon fade show" role="alert">
        <i class="fas fa-check-circle fa-lg mr-2"></i><strong>Success</strong> - {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
{{-- Errors Array --}}
@if($errors->any())
    <div class="alert alert-danger alert-dismissible alert-solid alert-label-icon fade show" role="alert">
        <i class="fas fa-ban fa-lg mr-2"></i><strong>Errors</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button>
    </div>
@endif
{{-- Errors Alert --}}
@if(session()->has('error'))
    <div class="alert alert-danger alert-dismissible alert-solid alert-label-icon fade show" role="alert">
        <i class="fas fa-ban fa-lg mr-2"></i><strong>Error</strong> - {{ session('error') }}
        <button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button>
    </div>
@endif
{{-- Warning Alert --}}
@if(session()->has('warning'))
    <div class="alert alert-warning alert-dismissible alert-solid alert-label-icon fade show" role="alert">
        <i class="fas fa-exclamation-circle fa-lg mr-2"></i><strong>Warning</strong> - {{ session('warning') }}
        <button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button>
    </div>
@endif
{{-- Info Alert --}}
@if(session()->has('info'))
    <div class="alert alert-info alert-dismissible alert-solid alert-label-icon fade show" role="alert">
        <i class="fas fa-info-circle fa-lg mr-2"></i><strong>Info</strong> - {{ session('info') }}
        <button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button>
    </div>
@endif