@extends('layouts.admin')

@section('admin-content')

  <x-admin.header.show-component name="{{ __('Chart') }}" plural-name="{{ __('Charts') }}" :title="$chart->title" :index-link="route('admin.charts.index')" :create-link="route('admin.charts.create')" />

  <!-- Responsive Iframe container -->
  <div class="row d-flex justify-content-center">
    <div class="col-md-12">
      <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item iframe-chart" src="{{ route('charts.shadow', $chart) }}" allowfullscreen scrolling="no"></iframe>
      </div>
    </div>
  </div><!-- Responsive Iframe container -->

@endsection
