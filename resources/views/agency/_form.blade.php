<div class="card-body">
    <div class="form-group">
        {{ html()->bootText(name: 'name', required: true) }}
    </div>
    
    <div class="form-group">
        {{ html()->bootText(name: 'email', required: false) }}
    </div>
</div>



