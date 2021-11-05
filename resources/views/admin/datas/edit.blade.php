@extends('layouts.admin')

@section('admin-content')

  <x-admin.header.show-component name="{{ __('Data') }}" plural-name="{{ __('Datas') }}" :title="$data->name" :index-link="route('admin.datas.index')" :create-link="route('admin.datas.create')" />

  <form id="form" action="{{ route('admin.datas.update', $data) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!--Form inputs upper row -->
    <div class="row">

      <!-- Data name -->
      <div class="form-group col-md-4">
        <label for="name">Name</label>
        <input id="name" name="name" type="text" class="form-control" value="{{ $data->name }}" required>
      </div><!-- Data name -->

      <!-- Data type -->
      <div class="form-group col-md-2">
        <label for="type">Type</label>
        <select id="type" name="type" type="text" class="form-control" required>
          <option {{ ($data->type == 'JSON') ? 'selected' : '' }}>JSON</option>
          <option {{ ($data->type == 'CSV') ? 'selected' : '' }}>CSV</option>
          <option {{ ($data->type == 'TSV') ? 'selected' : '' }}>TSV</option>
          <option {{ ($data->type == 'EXCEL') ? 'selected' : '' }}>EXCEL</option>
          <option {{ ($data->type == 'TEXT') ? 'selected' : '' }}>TEXT</option>
        </select>
      </div><!-- Data type -->

      <!-- Data file -->
      <div class="form-group col-md-4">
        <label for="file">Data file</label>
        <input id="file" name="file" type="file" class="form-control-file" required>
      </div><!-- Data file -->

      <!-- Form buttons -->
      <div class="form-group col-md-2 d-flex align-items-end justify-content-end">
        <!-- Action buttons -->
        <button type="submit" form="form" class="btn btn-primary mr-1" id="updateSlideElementTypeBtn">Save</button>
        <a href="{{ route('admin.datas.index') }}" class="btn btn-danger">Cancel</a>
      </div><!-- Form buttons -->

      <!-- Description -->
      <div class="form-group col-md-6">
        <label for="description">Description</label>
        <textarea id="description" class="form-control" name="description" rows="5">{{ $data->description }}</textarea>
      </div><!-- Description -->


    </div><!--Form inputs upper row -->


    <!-- Row editor -->
    {{-- <div class="row editor" id="editor"> --}}

      <!-- Row display Datas -->
      <div class="row">
        <div class="col-md-12">
          <pre id="displayDatas" class="editors rounded"><code class="h-100">{!! $content !!}</code></pre>
        </div>
      </div><!-- Row display Datas -->

      {{-- <!-- JS Editor -->
      <div class="form-group col-md-6">
      <P>Javascript</P>
      <pre id="modifyCodeJS" class="editors rounded"><code class="javascript h-100" contenteditable="true" oninput="codeToTextarea(this, 'textareaJS')">{{ $chart->js ?? '// Write your Eloquent code ...' }}</code></pre>
    </div><!-- JS Editor -->

    <!-- CSS Editor -->
    <div class="form-group col-md-6">
    <P>CSS</P>
    <pre id="modifyCodeCSS" class="editors rounded"><code class="css h-100" contenteditable="true" oninput="codeToTextarea(this, 'textareaCSS')">{{ $chart->css ?? "/* Write your code ... */" }}</code></pre>
  </div><!-- CSS Editor -->

  <!-- Undisplayed <textarea>, will be filled with the content of the correponding <div>  -->
  <textarea id="textareaJS" class="textInput" name="js" hidden>{{ $chart->js }}</textarea>
  <textarea id="textareaCSS" class="textInput" name="css" hidden>{{ $chart->css }}</textarea> --}}

{{-- </div><!-- Row editor --> --}}

</form>

@endsection
