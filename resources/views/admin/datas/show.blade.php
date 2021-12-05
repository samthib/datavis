@extends('layouts.admin')

@section('admin-content')

  <x-admin.header.show-component name="{{ __('Data') }}" plural-name="{{ __('Datas') }}" :title="$data->name" :index-link="route('admin.datas.index')" :create-link="route('admin.datas.create')" />

    <!-- Link to file -->
    <div class="alert alert-primary" role="alert">
      <a href="{{ asset('storage/'.$data->file) }}" class="alert-link" target="blank">{{ asset('storage/'.$data->file) }}</a>
    </div><!-- Link to file -->

    <!-- Row display Datas -->
    <div class="row">
      <div class="col-md-12">
        <pre id="displayDatas" class="vh-100 rounded">{!! $content !!}</pre>
      </div>
    </div><!-- Row display Datas -->


    <script>
    window.onload = function () {
      editorDisplay('displayDatas', 'json');
    }
  </script>

@endsection
