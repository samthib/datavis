@extends('layouts.admin')

@section('admin-content')

  <x-admin.header.create-component plural-name="{{ __('Designs') }}" title="{{ __('New Design') }}" :index-link="route('admin.designs.index')" />


  <form id="form" action="{{ route('admin.designs.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <!--Form inputs upper row -->
    <div class="row">

      <!-- Site title -->
      <div class="form-group col-md-4">
        <label for="title">Title</label>
        <input id="title" name="title" type="text" class="form-control" value="{{ old('title') }}" required>
      </div><!-- Site title -->

      <!-- Site subtitle -->
      <div class="form-group col-md-4">
        <label for="subtitle">Subtitle</label>
        <input id="subtitle" name="subtitle" type="text" class="form-control" value="{{ old('subtitle') }}" required>
      </div><!-- Site subtitle -->

      <!-- Checkbox Active-->
      <div class="form-group col-md-2 d-flex align-items-end">
        <label for="active">
          <span>Active</span>
          <input id="active" name="active" type="checkbox" {{ old('active') ? 'checked' : '' }}/>
        </label>
      </div><!-- Checkbox Active-->

      <!-- Form buttons -->
      <div class="form-group col-md-2 d-flex align-items-end justify-content-end">
        <!-- Action buttons -->
        <button type="submit" form="form" class="btn btn-primary mr-1">Save</button>
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
        <input id="color" name="color" type="color" class="form-control" value="{{ old('color') }}" required>
      </div><!-- Site main color -->

      <!-- HTML Editor -->
      <div class="form-group col-md-12">
        <p>Description</p>
        <pre id="modifyCodeHTML" class="vh-100 rounded">{!! old('description') ?? "<!-- Write your code ... -->" !!}</pre>
        <textarea id="textareaHTML" class="textInput" name="description" hidden>{!! old('description') !!}</textarea>
      </div><!-- HTML Editor -->
      
    </div>
     <!--Form inputs upper row -->
      
  </form>
      
  <script>
    window.onload = function () {
      editorToTextarea('modifyCodeHTML', 'textareaHTML', 'html');
    }
  </script>


@endsection
