<!-- Messages Flash -->
@if (Session::has('message'))
  <div class="alert alert-info alert-dismissible fade show" role="alert">
    <strong>{!! Session::get('message') !!}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
<!-- Error messages Flash -->
@if (Session::has('error'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{!! Session::get('error') !!}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
<!-- Error validation messages Flash -->
@if ($errors->any())
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{!! $errors->first() !!}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
