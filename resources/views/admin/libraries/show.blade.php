@extends('layouts.admin')

@section('admin-content')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Libraries</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <a class="btn btn-secondary" href="{!! route('admin.libraries.index') !!}" role="button"><span data-feather="list"></span> Libraries list</a>
      </div>
      <div class="btn-group mr-2">
        <a class="btn btn-success" href="{!! route('admin.libraries.create') !!}" role="button"><span data-feather="plus-circle"></span> New Library</a>
      </div>
    </div>
  </div>

  <h3 class="text-center">{{ $library->name." - ".$library->version }}</h3>

  <!-- Row display Libraries -->
  <div class="row mt-5">
    <div class="col-md-12">
      <pre id="displayDatas" class="editors rounded"><code class="h-100">{!! $content !!}</code></pre>
    </div>
  </div><!-- Row display Libraries -->

@endsection
