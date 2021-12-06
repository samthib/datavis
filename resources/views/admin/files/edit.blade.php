@extends('layouts.admin')

@section('admin-content')

<x-admin.header.show-component name="{{ __('File') }}" plural-name="{{ __('Files') }}" :title="$file->name"
  :index-link="route('admin.files.index')" :create-link="route('admin.files.create')" />

<form id="form" action="{{ route('admin.files.update', $file) }}" method="post" enctype="multipart/form-data">
  @csrf
  @method('PUT')

  <!--Form inputs upper row -->
  <div class="row">

    <!-- File name -->
    <div class="form-group col-md-4">
      <label for="name">Name</label>
      <input id="name" name="name" type="text" class="form-control" value="{{ $file->name }}" required>
    </div><!-- File name -->

    <!-- File type -->
    <div class="form-group col-md-2">
      <label for="type">Type</label>
      <select id="type" name="type" type="text" class="form-control" required>
        <option {{ ($file->type == 'javascript') ? 'selected' : '' }}>javascript</option>
        <option {{ ($file->type == 'css') ? 'selected' : '' }}>css</option>
        <option {{ ($file->type == 'json') ? 'selected' : '' }}>json</option>
        <option {{ ($file->type == 'pdf') ? 'selected' : '' }}>pdf</option>
        <option {{ ($file->type == 'text') ? 'selected' : '' }}>text</option>
      </select>
    </div><!-- File type -->

    <!-- File file -->
    <div class="form-group col-md-4">
      <label for="file">File file</label>
      <input id="file" name="file" type="file" class="form-control-file">
    </div><!-- File file -->

    <!-- Form buttons -->
    <div class="form-group col-md-2 d-flex align-items-end justify-content-end">
      <!-- Action buttons -->
      <button type="submit" form="form" class="btn btn-primary mr-1" id="updateFiles">Save</button>
      <a href="{{ route('admin.files.index') }}" class="btn btn-danger">Cancel</a>
    </div><!-- Form buttons -->

    <!-- Description -->
    <div class="form-group col-md-9">
      <label for="description">Description</label>
      <textarea id="description" class="form-control" name="description" rows="5">{{ $file->description }}</textarea>
    </div><!-- Description -->


  </div>
  <!--Form inputs upper row -->

  <!-- Link to file -->
  <div class="alert alert-primary" role="alert">
    <a href="{{ asset('storage/'.$file->file) }}" class="alert-link" target="blank">{{ asset('storage/'.$file->file)
      }}</a>
  </div><!-- Link to file -->

  <!-- Row display Files -->
  <div class="row">
    <div class="col-md-12">
      <pre id="displayFile" class="vh-100 rounded">{!! $content !!}</pre>
    </div>
  </div><!-- Row display Files -->

</form>


  @include('admin.files.partials.scripts')

@endsection