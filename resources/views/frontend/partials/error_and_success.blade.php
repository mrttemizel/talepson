@if (session()->get('success'))
    <div class="alert alert-success alert-dismissible alert-solid alert-label-icon fade show" role="alert">
        <i class="ri-check-double-line label-icon"></i><strong>  {{ session()->get('success') }}</strong>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session()->get('error'))
    <div class="alert alert-danger alert-dismissible alert-solid alert-label-icon fade show" role="alert">
        <i class="ri-check-double-line label-icon"></i>
        <strong>{{ session()->get('success') }}</strong>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
