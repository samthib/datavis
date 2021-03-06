@extends('layouts.admin')

@section('admin-content')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ __('Dashboard') }}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
      </div>
      <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
        <span data-feather="calendar"></span>
        This week
      </button>
    </div>
  </div>

  <!-- Dashboard visits chart -->
  <canvas id="visitsChart" class="my-4 w-100" width="900" height="380"></canvas>


  <h2>{{ __('Visits counter') }}</h2>
  <div class="table-responsive">
    <table class="table table-dark table-bordered table-striped table-hover table-responsive-md">
      <thead>
        <tr>
          <th>#</th>
          <th>{{ __('Date') }}</th>
          <th>{{ __('Views Count') }}</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($visits as $key => $visit)
          <tr>
            <td>{{ $visit->id }}</td>
            <td>{{ $visit->date }}</td>
            <td>{{ $visit->count }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>


  <!-- Pagination -->
  <div class="d-flex justify-content-center pt-5">
    {{ $visits->links() }}
  </div>


  <!-- Variables for visits-chart.js -->
  <script type="text/javascript">
  const visits = {!! $visits->pluck('count', 'date')->sortKeys() !!};
  const dates = Object.keys(visits);
  const counts = Object.values(visits);
  </script>

@endsection
