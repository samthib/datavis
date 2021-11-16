@extends('layouts.admin')

@section('admin-content')

  <x-admin.header.create-component plural-name="{{ __('Charts') }}" title="{{ __('New Chart') }}" :index-link="route('admin.charts.index')" />


  <form id="form" action="{{ route('admin.charts.store') }}" method="post">
    @csrf

    <!--Form inputs upper row -->
    <div class="row">

      <!-- Graphic name -->
      <div class="form-group col-md-4">
        <label for="title">Title</label>
        <input id="title" name="title" type="text" class="form-control" required>
      </div><!-- Graphic name -->

      <!-- Graphic version name -->
      <div class="form-group col-md-4">
        <label for="subtitle">Subtitle</label>
        <input id="subtitle" name="subtitle" type="text" class="form-control" required>
      </div><!-- Graphic version name -->

      <!-- Checkbox Available-->
      <div class="form-group col-md-2 d-flex align-items-end">
        <label for="available">
          <span>Availabity</span>
          <input id="available" name="available" type="checkbox" checked/>
        </label>
      </div><!-- Checkbox Available-->

      <!-- Form buttons -->
      <div class="form-group col-md-2 d-flex align-items-end justify-content-end">
        <!-- Action buttons -->
        <button type="submit" form="form" class="btn btn-primary mr-1" id="updateSlideElementTypeBtn">Save</button>
        <a href="{{ route('admin.charts.index') }}" class="btn btn-danger">Cancel</a>
      </div><!-- Form buttons -->

      <!-- Description -->
      <div class="form-group col-md-8">
        <label for="description">Description</label>
        <textarea id="description" class="form-control" name="description" rows="5"></textarea>
      </div><!-- Description -->

      <!-- Library select -->
      <div class="form-group col-md-4">
        <label for="libraries[]">Libraries</label>
        <select id="libraries[]" name="libraries[]" class="custom-select" size="5" multiple required>
          @foreach ($libraries as $key => $library)
            <option value="{{ $library->id }}">{{ $library->name." - ".$library->version }}</option>
          @endforeach
        </select>
      </div><!-- Library select -->

      <!-- Data select -->
      <div class="form-group col-md-4">
        <label for="datas[]">Datas</label>
        <select id="datas[]" name="datas[]" class="custom-select" size="5" multiple>
          @foreach ($datas as $key => $data)
            <option value="{{ $data->id }}">{{ $data->name." - ".$data->type }}</option>
          @endforeach
        </select>
      </div><!-- Data select -->

      <!-- Data display -->
      <div class="form-group col-md-8">
        <label for="files[]">Links</label>
        <textarea id="files" class="form-control" rows="5">
          @foreach ($datas as $key => $data)
            {{ url('storage/'.$data->file) }}
          @endforeach
        </textarea>
      </div><!-- Data display -->

    </div><!--Form inputs upper row -->


    <!-- Row editor -->
    <div class="row editor" id="charts-editor">

      <!-- JS Editor -->
      <div class="form-group col-md-6">
        <P>Javascript</P>
        <pre id="modifyCodeJS" class="vh-100 rounded">
          {{ "// Write your code ..." }}
        </pre>
      </div><!-- JS Editor -->

      <!-- CSS Editor -->
      <div class="form-group col-md-6">
        <P>CSS</P>
        <pre id="modifyCodeCSS" class="vh-100 rounded">
          {{ "/* Write your code ... */" }}
        </pre>
      </div><!-- CSS Editor -->

      <!-- Undisplayed <textarea>, will be filled with the content of the correponding <div>  -->
      <textarea id="textareaJS" class="textInput" name="js" hidden></textarea>
      <textarea id="textareaCSS" class="textInput" name="css" hidden></textarea>

    </div><!-- Row editor -->

  </form>

  <script>
  window.onload = function () {
    editorToTextarea('modifyCodeJS', 'textareaJS', 'javascript');
    editorToTextarea('modifyCodeCSS', 'textareaCSS', 'css');
  }
  </script>
@endsection
