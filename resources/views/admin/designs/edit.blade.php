@extends('layouts.admin')

@section('admin-content')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Designs</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <a class="btn btn-secondary" href="{!! route('admin.designs.index') !!}" role="button"><span data-feather="list"></span> Designs list</a>
      </div>
    </div>
  </div>

  <h3 class="text-center">{{ $design->title }}</h3>


  <form id="form" action="{{ route('admin.designs.update', $design) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!--Form inputs upper row -->
    <div class="row">

      <!-- Site title -->
      <div class="form-group col-md-4">
        <label for="title">Title</label>
        <input id="title" name="title" type="text" class="form-control" value="{{ $design->title }}">
      </div><!-- Site title -->

      <!-- Site subtitle -->
      <div class="form-group col-md-4">
        <label for="subtitle">Subtitle</label>
        <input id="subtitle" name="subtitle" type="text" class="form-control" value="{{ $design->subtitle }}">
      </div><!-- Site subtitle -->

      <!-- Checkbox Active-->
      <div class="form-group col-md-2 d-flex align-items-end">
        <label for="active">
          <span>Active</span>
          <input id="active" name="active" type="checkbox" {{ ($design->active == 1) ? 'checked' : ''}}/>
        </label>
      </div><!-- Checkbox Active-->

      <!-- Form buttons -->
      <div class="form-group col-md-2 d-flex align-items-end justify-content-end">
        <!-- Action buttons -->
        <button type="submit" form="form" class="btn btn-primary mr-1" id="updateSlideElementTypeBtn">Save</button>
        <a href="{{ route('admin.designs.index') }}" class="btn btn-danger">Cancel</a>
      </div><!-- Form buttons -->

      <!-- Hero image -->
      <div class="form-group col-md-6">
        <label class="w-100" for="hero">Hero image</label>
        <img class="img-fluid" style="max-height:350px" src="{!! asset('storage/'.$design->hero) !!}" alt="Hero">
        <input id="hero" name="hero" type="file" class="form-control-file" {{ $design->hero }}>
      </div><!-- Hero image -->

      <!-- Logo image -->
      <div class="form-group col-md-6">
        <label class="w-100" for="logo">Logo image</label>
        <div class="text-center">
          <img class="img-fluid" style="max-height:350px" src="{!! asset('storage/'.$design->logo) !!}" alt="Hero">
        </div>
        <input id="logo" name="logo" type="file" class="form-control-file" {{ $design->logo }}>
      </div><!-- Logo image -->

      <!-- Site main color -->
      <div class="form-group col-md-4">
        <label for="color">Color</label>
        <input id="color" name="color" type="color" class="form-control" value="{{ $design->color }}" required>
      </div><!-- Site main color -->

      <!-- Description -->
      <div class="form-group col-md-8">
        <label for="description">Description</label>
        <textarea id="description" class="form-control" name="description" rows="5">{{ $design->description }}</textarea>
      </div><!-- escription -->

    </div><!--Form inputs upper row -->

  </form>


@endsection
