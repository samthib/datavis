@extends('layouts.admin')

@section('admin-content')

  <x-admin.header.create-component plural-name="{{ __('Medias') }}" title="{{ __('New Media') }}" :index-link="route('admin.medias.index')" />


  <form id="form" action="{{ route('admin.medias.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <!--Form inputs upper row -->
    <div class="row">

      <!-- Media name -->
      <div class="form-group col-md-4">
        <label for="name">Name</label>
        <input id="name" name="name" type="text" class="form-control" value="{{ old('name') }}" required>
      </div><!-- Media name -->

      <!-- Media type -->
      <div class="form-group col-md-2">
        <label for="type">Type</label>
        <select id="type" name="type" type="text" class="form-control" required>
          <option {{ old('type') == 'image' ? 'selected' : '' }}>image</option>
          <option {{ old('type') == 'video' ? 'selected' : '' }}>video</option>
        </select>
      </div><!-- Media type -->

      <!-- Media file -->
      <div class="form-group col-md-4">
        <label for="file">Media file</label>
        <input id="file" name="file" type="file" class="form-control-file" required>
      </div><!-- Media file -->

      <!-- Form buttons -->
      <div class="form-group col-md-2 d-flex align-items-end justify-content-end">
        <!-- Action buttons -->
        <button type="submit" form="form" class="btn btn-primary mr-1">Save</button>
        <a href="{{ route('admin.medias.index') }}" class="btn btn-danger">Cancel</a>
      </div><!-- Form buttons -->

      <!-- Description -->
      <div class="form-group col-md-9">
        <label for="description">Description</label>
        <textarea id="description" class="form-control" name="description" rows="5">{{ old('description') }}</textarea>
      </div><!-- Description -->


    </div><!--Form inputs upper row -->

  </form>


@endsection
