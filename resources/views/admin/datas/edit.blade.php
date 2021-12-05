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
            <option {{ ($data->type == 'json') ? 'selected' : '' }}>json</option>
            <option {{ ($data->type == 'csv') ? 'selected' : '' }}>csv</option>
            <option {{ ($data->type == 'tsv') ? 'selected' : '' }}>tsv</option>
            <option {{ ($data->type == 'excel') ? 'selected' : '' }}>excel</option>
            <option {{ ($data->type == 'text') ? 'selected' : '' }}>text</option>
          </select>
        </div><!-- Data type -->

        <!-- Data file -->
        <div class="form-group col-md-4">
          <label for="file">Data file</label>
          <input id="file" name="file" type="file" class="form-control-file">
        </div><!-- Data file -->

        <!-- Form buttons -->
        <div class="form-group col-md-2 d-flex align-items-end justify-content-end">
          <!-- Action buttons -->
          <button type="submit" form="form" class="btn btn-primary mr-1" id="updateDatas">Save</button>
          <a href="{{ route('admin.datas.index') }}" class="btn btn-danger">Cancel</a>
        </div><!-- Form buttons -->

        <!-- Description -->
        <div class="form-group col-md-9">
          <label for="description">Description</label>
          <textarea id="description" class="form-control" name="description" rows="5">{{ $data->description }}</textarea>
        </div><!-- Description -->


      </div><!--Form inputs upper row -->

      <!-- Link to file -->
      <div class="alert alert-primary" role="alert">
        <a href="{{ asset('storage/'.$data->file) }}" class="alert-link" target="blank">{{ asset('storage/'.$data->file) }}</a>
      </div><!-- Link to file -->

      <!-- Row display Datas -->
      <div class="row">
        <div class="col-md-12">
          <pre id="displayCode" class="vh-100 rounded">{!! $content !!}</pre>
        </div>
      </div><!-- Row display Datas -->

    </form>


    <script>
    window.onload = function () {
      editorDisplay('displayCode', 'json');
    }
    </script>
  </form>

@endsection
