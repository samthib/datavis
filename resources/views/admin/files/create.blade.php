@extends('layouts.admin')

@section('admin-content')

  <x-admin.header.create-component plural-name="{{ __('Files') }}" title="{{ __('New File') }}" :index-link="route('admin.files.index')" />


  <form id="form" action="{{ route('admin.files.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <!--Form inputs upper row -->
    <div class="row">

      <!-- File name -->
      <div class="form-group col-md-4">
        <label for="name">Name</label>
        <input id="name" name="name" type="text" class="form-control" value="{{ old('name') }}" required>
      </div><!-- File name -->

      <!-- File type -->
      <div class="form-group col-md-2">
        <label for="type">Type</label>
        <select id="type" name="type" type="text" class="form-control" required>
          <option {{ old('type') == 'javascript' ? 'selected' : '' }}>javascript</option>
          <option {{ old('type') == 'css' ? 'selected' : '' }}>css</option>
          <option {{ old('type') == 'json' ? 'selected' : '' }}>json</option>
          <option {{ old('type') == 'pdf' ? 'selected' : '' }}>pdf</option>
          <option {{ old('type') == 'text' ? 'selected' : '' }}>text</option>
        </select>
      </div><!-- File type -->

      <!-- File file -->
      <div class="form-group col-md-4">
        <label for="file">File file</label>
        <input id="file" name="file" type="file" class="form-control-file" required>
      </div><!-- File file -->

      <!-- Form buttons -->
      <div class="form-group col-md-2 d-flex align-items-end justify-content-end">
        <!-- Action buttons -->
        <button type="submit" form="form" class="btn btn-primary mr-1">Save</button>
        <a href="{{ route('admin.files.index') }}" class="btn btn-danger">Cancel</a>
      </div><!-- Form buttons -->

      <!-- Description -->
      <div class="form-group col-md-9">
        <label for="description">Description</label>
        <textarea id="description" class="form-control" name="description" rows="5">{{ old('description') }}</textarea>
      </div><!-- Description -->


    </div><!--Form inputs upper row -->

  </form>


@endsection
