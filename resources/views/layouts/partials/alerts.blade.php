<!-- Messages Flash -->
@if (Session::has('message'))
  <div class="alert alert-info alert-dismissible fade show my-1" role="alert">
    <strong>{!! Session::get('message') !!}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
<!-- Error messages Flash -->
@if (Session::has('error'))
  <div class="alert alert-danger alert-dismissible fade show my-1" role="alert">
    <strong>{!! Session::get('error') !!}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
<!-- Error validation messages Flash -->
@if ($errors->any())
  @foreach ($errors->all() as $key => $message)
    <div class="alert alert-danger alert-dismissible fade show my-1" role="alert">
      <strong>{{ $message }}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endforeach
@endif

<!-- Error validation messages Flash for Fortify update profile -->
@if ($errors->updateProfileInformation->any())
  @foreach ($errors->updateProfileInformation->all() as $key => $message)
    <div class="alert alert-danger alert-dismissible fade show my-1" role="alert">
      <strong>{{ $message }}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endforeach
@endif

<!-- Error validation messages Flash for Fortify update password -->
@if ($errors->updatePassword->any())
  @foreach ($errors->updatePassword->all() as $key => $message)
    <div class="alert alert-danger alert-dismissible fade show my-1" role="alert">
      <strong>{{ $message }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
  @endforeach
@endif