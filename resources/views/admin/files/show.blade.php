@extends('layouts.admin')

@section('admin-content')

  <x-admin.header.show-component name="{{ __('File') }}" plural-name="{{ __('Files') }}" :title="$file->name" :index-link="route('admin.files.index')" :create-link="route('admin.files.create')" />

    <!-- Link to file -->
    <div class="alert alert-primary" role="alert">
      <a href="{{ asset('storage/'.$file->file) }}" class="alert-link" target="blank">{{ asset('storage/'.$file->file) }}</a>
    </div><!-- Link to file -->

    <!-- Row display Files -->
    <div class="row">
      <div class="col-md-12">
        <pre id="displayFile" class="vh-100 rounded">{!! $content !!}</pre>
      </div>
    </div><!-- Row display Files -->


    @include('admin.files.partials.scripts')

@endsection
