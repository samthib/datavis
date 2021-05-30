@extends('layouts.admin')

@section('admin-content')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Designs</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <a class="btn btn-secondary" href="{!! route('admin.designs.index') !!}" role="button"><span data-feather="list"></span> Designs list</a>
      </div>
      <div class="btn-group mr-2">
        <a class="btn btn-success" href="{!! route('admin.designs.create') !!}" role="button"><span data-feather="plus-circle"></span> New Design</a>
      </div>
    </div>
  </div>

  <h3 class="text-center">{{ $design->title }}</h3>

  {{-- Responsive Iframe container --}}
  <div class="row d-flex justify-content-center">
    <div class="col-md-12">
      <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item iframe-chart" src="{{ route('admin.designs.shadow', $design) }}" allowfullscreen></iframe>
      </div>
    </div>
  </div>{{-- Responsive Iframe container --}}

@endsection
