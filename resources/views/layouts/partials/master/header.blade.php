<nav class="navbar navbar-expand-md navbar-dark site-header sticky-top py-1 bg-dark shadow">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExample04">
    <div class="container d-flex flex-column flex-md-row justify-content-between">
      <a class="py-2" href="{{ route('charts.index') }}" aria-label="Product">
        <img width="37" height="24" src="{{ asset('storage/'.$design->logo) }}" alt="Logo">
      </a>
      <a class="py-2 d-md-inline-block {{ (Str::contains(Route::currentRouteName(), 'abouts')) ? 'text-white' : '' }}" href="{{ route('pages.abouts') }}">A-propos</a>
      <a class="py-2 d-md-inline-block {{ (Str::contains(Route::currentRouteName(), 'features')) ? 'text-white' : '' }}" href="{{ route('pages.features') }}">Fonctionnement</a>
      <a class="py-2 d-md-inline-block {{ (Str::contains(Route::currentRouteName(), 'messages')) ? 'text-white' : '' }}" href="{{ route('messages.create') }}">Contact</a>
      <a class="py-2 d-md-inline-block" href="https://samuel-thibault.fr">Samuel Thibault <i class="fa fa-external-link-square" aria-hidden="true"></i></a>
    </div>
  </div>

</nav>
