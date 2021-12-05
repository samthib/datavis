@extends('layouts.admin')

@section('admin-content')

<x-admin.header.show-component name="{{ __('Media') }}" plural-name="{{ __('Medias') }}" :title="$media->name"
  :index-link="route('admin.medias.index')" :create-link="route('admin.medias.create')" />

<form id="form" action="{{ route('admin.medias.update', $media) }}" method="post" enctype="multipart/form-data">
  @csrf
  @method('PUT')

  <!--Form inputs upper row -->
  <div class="row">

    <!-- Media name -->
    <div class="form-group col-md-4">
      <label for="name">Name</label>
      <input id="name" name="name" type="text" class="form-control" value="{{ $media->name }}" required>
    </div><!-- Media name -->

    <!-- Media type -->
    <div class="form-group col-md-2">
      <label for="type">Type</label>
      <select id="type" name="type" type="text" class="form-control" required>
        <option {{ ($media->type == 'image') ? 'selected' : '' }}>image</option>
        <option {{ ($media->type == 'video') ? 'selected' : '' }}>video</option>
      </select>
    </div><!-- Media type -->

    <!-- Media file -->
    <div class="form-group col-md-4">
      <label for="file">Media file</label>
      <input id="file" name="file" type="file" class="form-control-file">
    </div><!-- Media file -->

    <!-- Form buttons -->
    <div class="form-group col-md-2 d-flex align-items-end justify-content-end">
      <!-- Action buttons -->
      <button type="submit" form="form" class="btn btn-primary mr-1" id="updateMedias">Save</button>
      <a href="{{ route('admin.medias.index') }}" class="btn btn-danger">Cancel</a>
    </div><!-- Form buttons -->

    <!-- Description -->
    <div class="form-group col-md-9">
      <label for="description">Description</label>
      <textarea id="description" class="form-control" name="description" rows="5">{{ $media->description }}</textarea>
    </div><!-- Description -->
  
  </div><!--Form inputs upper row -->
  
  <!-- Link to file -->
  <div class="alert alert-primary" role="alert">
    <a href="{{ asset('storage/'.$media->file) }}" class="alert-link" target="blank">{{ asset('storage/'.$media->file)
      }}</a>
  </div><!-- Link to file -->

  <!-- Row display Medias -->
  <div class="row">
    <div class="col-md-12">
      @if ($media->type == 'image')
      <img src="{{ asset('storage/'.$media->file) }}" alt="image" width="100%">
      @elseif ($media->type == 'video')
      <video src="{{ asset('storage/'.$media->file) }}" controls width="100%"></video>
      @endif
    </div>
  </div><!-- Row display Medias -->
</form>

@endsection