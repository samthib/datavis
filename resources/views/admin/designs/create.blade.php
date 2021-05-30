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

  <h3 class="text-center">{{ __('New design') }}</h3>


  <form id="form" action="{{ route('admin.designs.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <!--Form inputs upper row -->
    <div class="row">

      <!-- Site title -->
      <div class="form-group col-md-4">
        <label for="title">Title</label>
        <input id="title" name="title" type="text" class="form-control" required>
      </div><!-- Site title -->

      <!-- Site subtitle -->
      <div class="form-group col-md-4">
        <label for="subtitle">Subtitle</label>
        <input id="subtitle" name="subtitle" type="text" class="form-control" required>
      </div><!-- Site subtitle -->

      <!-- Checkbox Active-->
      <div class="form-group col-md-2 d-flex align-items-end">
        <label for="active">
          <span>Active</span>
          <input id="active" name="active" type="checkbox" checked/>
        </label>
      </div><!-- Checkbox Active-->

      <!-- Form buttons -->
      <div class="form-group col-md-2 d-flex align-items-end justify-content-end">
        <!-- Action buttons -->
        <button type="submit" form="form" class="btn btn-primary mr-1" id="updateSlideElementTypeBtn">Save</button>
        <a href="{{ route('admin.designs.index') }}" class="btn btn-danger">Cancel</a>
      </div><!-- Form buttons -->

      <!-- Hero image -->
      <div class="form-group col-md-4">
        <label for="hero">Hero image</label>
        <input id="hero" name="hero" type="file" class="form-control-file">
      </div><!-- Hero image -->

      <!-- Logo image -->
      <div class="form-group col-md-4">
        <label for="logo">Logo image</label>
        <input id="logo" name="logo" type="file" class="form-control-file">
      </div><!-- Logo image -->

      <!-- Site main color -->
      <div class="form-group col-md-4">
        <label for="color">Color</label>
        <input id="color" name="color" type="color" class="form-control" required>
      </div><!-- Site main color -->

      <!-- Description -->
      <div class="form-group col-md-8">
        <label for="description">Description</label>
        <textarea id="description" class="form-control" name="description" rows="5"></textarea>
      </div><!-- Description -->

  </div><!--Form inputs upper row -->

</form>


@endsection
