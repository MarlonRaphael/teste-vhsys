<div class="alert alert-{{ $type }} alert-dismissible border border-light fade show" role="alert">
  <span class="alert-inner--icon">
    <i class="ni ni-like-2"></i>
  </span>
  <span class="alert-inner--text">
    <strong class="alert-heading">{{ $title }}</strong> {{ $message }}
  </span>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>