@extends('layouts.admin')

@section('admin-content')

  <x-admin.header.show-component name="{{ __('Design') }}" plural-name="{{ __('Designs') }}" :title="$design->title" :index-link="route('admin.designs.index')" :create-link="route('admin.designs.create')" />

  <!-- Responsive Iframe container -->
  <div class="row d-flex justify-content-center">
    <div class="col-md-12">
      <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item iframe-chart" src="{{ route('admin.designs.shadow', $design) }}" allowfullscreen></iframe>
      </div>
    </div>
  </div><!-- Responsive Iframe container -->

@endsection
