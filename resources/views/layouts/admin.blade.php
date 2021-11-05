<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v4.1.1">
  <title>{{ __('Dashboard') }} {{ config('app.name', 'Laravel') }}</title>

  @include('layouts.partials.admin.links')
</head>
<body>

  @include('layouts.partials.admin.header')

  <div class="container-fluid">
    <div class="row">

      @include('layouts.partials.admin.sidebar')

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

        <!-- Alert box -->
        <div class="d-flex flex-column align-items-end m-1">
          @include('layouts.partials.alerts')
        </div>

        @yield('admin-content')

      </main>

    </div>
  </div>

  @include('layouts.partials.admin.scripts')
</body>
</html>
