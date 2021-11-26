<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="{!! route('charts.index') !!}" target="_blank"><span data-feather="external-link"></span> Datavis</a>
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="{!! route('dashboard') !!}" target="_blank">
    <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" style="max-width: 25px; max-height: 25px">
      <path
        d="M11.395 44.428C4.557 40.198 0 32.632 0 24 0 10.745 10.745 0 24 0a23.891 23.891 0 0113.997 4.502c-.2 17.907-11.097 33.245-26.602 39.926z"
        fill="#6875F5"></path>
      <path
        d="M14.134 45.885A23.914 23.914 0 0024 48c13.255 0 24-10.745 24-24 0-3.516-.756-6.856-2.115-9.866-4.659 15.143-16.608 27.092-31.75 31.751z"
        fill="#6875F5"></path>
    </svg>
    Jetstream
  </a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100 ml-3 rounded" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <form action="{!! route('logout') !!}" method="post">
        @csrf
        <button type="submit" class="btn btn-outline-light">Sign out</button>
      </form>
    </li>
  </ul>
</nav>
