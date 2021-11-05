@extends('layouts.admin')

@section('admin-content')

  <x-admin.header.show-component name="{{ __('Design') }}" plural-name="{{ __('Designs') }}" :title="$design->title" :index-link="route('admin.designs.index')" :create-link="route('admin.designs.create')" />

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
