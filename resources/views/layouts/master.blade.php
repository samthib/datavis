<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Data Visualisation platform">
  <meta name="author" content="Samuel Thibault">
  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ asset('storage/'.($design->logo ?? '')) }}">

  @include('layouts.partials.master.links')

  <!-- Dynamics custom styles -->
  @include('layouts.partials.master.styles')
</head>
<body>

  @include('layouts.partials.master.header')

  <main class="min-vh-100 border-bottom border-white">
    @yield('content')
  </main>

  @include('layouts.partials.master.footer')


  @include('layouts.partials.master.scripts')
</body>
</html>
