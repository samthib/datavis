@extends('layouts.admin')

@section('admin-content')

<x-admin.header.show-component name="{{ __('Libraries') }}" plural-name="{{ __('Librariess') }}"
  :title="$library->name.' - '.$library->type" :index-link="route('admin.libraries.index')"
  :create-link="route('admin.libraries.create')" />

<!-- Link to file -->
<div class="alert alert-primary" role="alert">
  <a href="{{ $library->link }}" class="alert-link" target="blank">{{ $library->link }}</a>
</div><!-- Link to file -->

<!-- Row display Libraries -->
<div class="row">
  <div class="col-md-12">
    <pre id="displayLibraries" class="vh-100 rounded">{!! $content !!}</pre>
  </div>
</div><!-- Row display Libraries -->


<script>
  window.onload = function () {
    editorDisplay('displayLibraries', '{{ $library->type }}');
  }
</script>

@endsection