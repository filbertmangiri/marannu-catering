@if (session()->has('alert'))
  <div class="alert {{ session('alert')['success'] ? 'alert-success' : 'alert-danger' }} alert-dismissible" role="alert">
    <i class="bi {{ session('alert')['success'] ? 'bi-check-circle-fill' : 'bi-exclamation-triangle-fill' }}"></i>

    {!! session('alert')['message'] !!}

    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
