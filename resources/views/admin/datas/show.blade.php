@extends('layouts.admin')

@section('admin-content')

  <x-admin.header.show-component name="{{ __('Data') }}" plural-name="{{ __('Datas') }}" :title="$data->name" :index-link="route('admin.datas.index')" :create-link="route('admin.datas.create')" />

  <!-- Row display Datas -->
  <div class="row mt-5">
    <div class="col-md-12">
      <pre id="displayDatas" class="editors rounded"><code class="h-100">{!! $content !!}</code></pre>
    </div>
  </div><!-- Row display Datas -->

@endsection
