<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v4.1.1">
  <title>Dashboard Datavis</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

  <script src="{!! asset('js/app.js') !!}" defer></script>

  <!-- Bootstrap core CSS -->
  <link href="https://getbootstrap.com/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <!-- Font awesome CDN  -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  <!-- Custom styles for this template -->
  <link href="https://getbootstrap.com/docs/4.5/examples/dashboard/dashboard.css" rel="stylesheet">


  {{-- Highlight.js CDN --}}
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.3.1/styles/monokai-sublime.min.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.3.1/highlight.min.js"></script>
  <script>hljs.initHighlightingOnLoad();</script>

  <!-- Main Quill library -->
  <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>

  <!-- Quill Theme included stylesheets -->
  <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

</head>
<body>

  <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="{!! route('charts.index') !!}" target="_blank"><span data-feather="external-link"></span> Datavis</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <form action="{!! route('logout') !!}" method="post">
          @csrf
          <button type="submit" class="btn btn-outline-light">Sign out</button>
        </form>
      </li>
    </ul>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="sidebar-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link {{ (Str::contains(url()->current(), 'dashboard')) ? 'active' : '' }}" href="{!! route('admin.index') !!}">
                <span data-feather="home"></span>
                Dashboard <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ (Str::contains(url()->current(), 'charts')) ? 'active' : '' }}" href="{!! route('admin.charts.index') !!}">
                <span data-feather="bar-chart-2"></span>
                Charts
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ (Str::contains(url()->current(), 'libraries')) ? 'active' : '' }}" href="{!! route('admin.libraries.index') !!}">
                <span data-feather="code"></span>
                Libraries
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ (Str::contains(url()->current(), 'datas')) ? 'active' : '' }}" href="{!! route('admin.datas.index') !!}">
                <span data-feather="database"></span>
                Datas
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ (Str::contains(url()->current(), 'users')) ? 'active' : '' }}" href="{!! route('admin.users.index') !!}">
                <span data-feather="users"></span>
                Users
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ (Str::contains(url()->current(), 'designs')) ? 'active' : '' }}" href="{!! route('admin.designs.index') !!}">
                <span data-feather="layout"></span>
                Designs
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ (Str::contains(url()->current(), 'pages')) ? 'active' : '' }}" href="{!! route('admin.pages.index') !!}">
                <span data-feather="sidebar"></span>
                Pages
              </a>
            </li>
            <li class="nav-item accordion" id="accordion-messages">
              <a class="nav-link {{ (Str::contains(url()->current(), 'messages')) ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#collapse-messages" aria-expanded="true" aria-controls="collapse-messages">
                <span data-feather="mail"></span>
                Messages
              </a>
              <ul id="collapse-messages" class="nav flex-column collapse ml-3 {{ (Str::contains(url()->current(), 'messages')) ? 'show' : '' }}" data-parent="#accordion-messages">
                <li class="nav-item">
                  <a class="nav-link {{ (Str::contains(url()->current(), 'inbox')) ? 'active' : '' }}" href="{!! route('admin.messages.inbox.index') !!}">
                    <span data-feather="inbox"></span>
                    Inbox
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ (Str::contains(url()->current(), 'sent')) ? 'active' : '' }}" href="{!! route('admin.messages.sent.index') !!}">
                    <span data-feather="send"></span>
                    Sent
                  </a>
                </li>
              </ul>
            </li>
          </ul>

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Saved reports</span>
            <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
              <span data-feather="plus-circle"></span>
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Current month
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Last quarter
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Social engagement
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Year-end sale
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

        {{-- Alert box --}}
        <div class="d-flex justify-content-end m-1">
          @include('layouts.tools.messages')
        </div>

        @yield('admin-content')

      </main>

    </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
  <script src="https://getbootstrap.com/docs/4.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>

  <!-- Feather icons initialisation -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
  <script>feather.replace()</script>
</body>
</html>