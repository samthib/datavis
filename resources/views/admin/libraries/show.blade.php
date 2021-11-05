@extends('layouts.admin')

@section('admin-content')

  <x-admin.header.show-component name="{{ __('Libraries') }}" plural-name="{{ __('Librariess') }}" :title="$library->name.' - '.$library->version" :index-link="route('admin.libraries.index')" :create-link="route('admin.libraries.create')" />

  <!-- Row display Libraries -->
  <div class="row mt-5">
    <div class="col-md-12">
      <pre id="displayDatas" class="editors rounded"><code class="h-100">{!! $content !!}</code></pre>
    </div>
  </div><!-- Row display Libraries -->

@endsection
