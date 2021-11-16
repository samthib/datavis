@extends('layouts.admin')

@section('admin-content')

  <x-admin.header.show-component name="{{ __('Library') }}" plural-name="{{ __('Libraries') }}" :title="$library->name.' - '.$library->version" :index-link="route('admin.libraries.index')" :create-link="route('admin.libraries.create')" />

    <form id="form" action="{{ route('admin.libraries.update', $library) }}" method="post">
      @csrf
      @method('PUT')

      <!--Form inputs upper row -->
      <div class="row">

        <!-- Library name -->
        <div class="form-group col-md-4">
          <label for="name">Name</label>
          <input id="name" name="name" type="text" class="form-control" value="{{ $library->name }}" required>
        </div><!-- Library name -->

        <!-- Library version name -->
        <div class="form-group col-md-2">
          <label for="version">Version</label>
          <input id="version" name="version" type="text" class="form-control" value="{{ $library->version }}" required>
        </div><!-- Library version name -->

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


      <!-- Row display Library -->
      <div class="row">
        <div class="col-md-12">
          <P>Library's code</P>
          <pre id="displayCode" class="editors rounded">
            {!! $content !!}
          </pre>
        </div>

        <!-- Undisplayed <textarea>, will be filled with the content of the correponding <div>  -->
        <textarea id="textareaCode" class="textInput" name="js" hidden disabled>{!! $content !!}</textarea>

      </div><!-- Row display Library -->

    </form>


    <script>
    window.onload = function () {
      editorToTextarea('displayCode', 'textareaCode', 'javascript');
    }
  </script>

@endsection
