@extends('layouts.admin')

@section('admin-content')

  <x-admin.header.show-component name="{{ __('Page') }}" plural-name="{{ __('Pages') }}" :title="$page->title" :index-link="route('admin.pages.index')" :create-link="route('admin.pages.create')" />

  <!-- Responsive Iframe container -->
  <div class="row d-flex justify-content-center">
    <div class="col-md-12">
      <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item iframe-chart" src="{{ route('pages.show', $page) }}" allowfullscreen></iframe>
      </div>
    </div>
  </div><!-- Responsive Iframe container -->

@endsection
