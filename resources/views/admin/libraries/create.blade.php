@extends('layouts.admin')

@section('admin-content')

  <x-admin.header.create-component plural-name="{{ __('Libraries') }}" title="{{ __('New Library') }}" :index-link="route('admin.libraries.index')" />


  <form id="form" action="{{ route('admin.libraries.store') }}" method="post">
    @csrf

    <!--Form inputs upper row -->
    <div class="row">

      <!-- Graphic name -->
      <div class="form-group col-md-4">
        <label for="name">Name</label>
        <input id="name" name="name" type="text" class="form-control" value="{{ old('name') }}" required>
      </div><!-- Graphic name -->

      <!-- Graphic version name -->
      <div class="form-group col-md-2">
        <label for="version">Version</label>
        <input id="version" name="version" type="text" class="form-control" value="{{ old('version') }}" required>
      </div><!-- Graphic version name -->

      <!-- Library link -->
      <div class="form-group col-md-4">
        <label for="link">Library link</label>
        <input id="link" name="link" type="text" class="form-control" value="{{ old('link') }}" required>
      </div><!-- Library link -->

      <!-- Form buttons -->
      <div class="form-group col-md-2 d-flex align-items-end justify-content-end">
        <!-- Action buttons -->
        <button type="submit" form="form" class="btn btn-primary mr-1">Save</button>
        <a href="{{ route('admin.libraries.index') }}" class="btn btn-danger">Cancel</a>
      </div><!-- Form buttons -->

      <!-- Description -->
      <div class="form-group col-md-6">
        <label for="description">Description</label>
        <textarea id="description" class="form-control" name="description" rows="5">{{ old('description') }}</textarea>
      </div><!-- Description -->


    </div><!--Form inputs upper row -->

  </form>


@endsection
