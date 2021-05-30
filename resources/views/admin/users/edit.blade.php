@extends('layouts.admin')

@section('admin-content')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Libraries</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <a class="btn btn-secondary" href="{!! route('admin.libraries.index') !!}" role="button"><span data-feather="list"></span> Libraries list</a>
      </div>
      <div class="btn-group mr-2">
        <a class="btn btn-success" href="{!! route('admin.libraries.create') !!}" role="button"><span data-feather="plus-circle"></span> New Library</a>
      </div>
    </div>
  </div>

  <h3 class="text-center">{{ __('New Library') }}</h3>


  <form id="form" action="{{ route('admin.libraries.store') }}" method="post">
    @csrf

    <!--Form inputs upper row -->
    <div class="row">

      <!-- Graphic name -->
      <div class="form-group col-md-4">
        <label for="name">Name</label>
        <input id="name" name="name" type="text" class="form-control" value="{{ $library->name }}" required>
      </div><!-- Graphic name -->

      <!-- Graphic version name -->
      <div class="form-group col-md-2">
        <label for="version">Version</label>
        <input id="version" name="version" type="text" class="form-control" value="{{ $library->version }}" required>
      </div><!-- Graphic version name -->

      <!-- Library link -->
      <div class="form-group col-md-4">
        <label for="link">Library link</label>
        <input id="link" name="link" type="text" class="form-control" value="{{ $library->link }}" required>
      </div><!-- Library link -->

      <!-- Form buttons -->
      <div class="form-group col-md-2 d-flex align-items-end justify-content-end">
        <!-- Action buttons -->
        <button type="submit" form="form" class="btn btn-primary mr-1" id="updateSlideElementTypeBtn">Save</button>
        <a href="{{ route('admin.libraries.index') }}" class="btn btn-danger">Cancel</a>
      </div><!-- Form buttons -->

      <!-- Description -->
      <div class="form-group col-md-6">
        <label for="description">Description</label>
        <textarea id="description" class="form-control" name="description" rows="5">{{ $library->description }}</textarea>
      </div><!-- Description -->


    </div><!--Form inputs upper row -->

  </form>


@endsection
