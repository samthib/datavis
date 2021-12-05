@extends('layouts.admin')

@section('admin-content')

  <x-admin.header.show-component name="{{ __('Media') }}" plural-name="{{ __('Medias') }}" :title="$media->name" :index-link="route('admin.medias.index')" :create-link="route('admin.medias.create')" />

    <!-- Link to file -->
    <div class="alert alert-primary" role="alert">
      <a href="{{ asset('storage/'.$media->file) }}" class="alert-link" target="blank">{{ asset('storage/'.$media->file) }}</a>
    </div><!-- Link to file -->

    <!-- Row display Medias -->
    <div class="row">
      <div class="col-md-12">
        @if ($media->type == 'image')
            <img src="{{ asset('storage/'.$media->file) }}" alt="image" width="100%">
        @elseif ($media->type == 'video')
            <video src="{{ asset('storage/'.$media->file) }}" controls width="100%"></video>
        @endif
      </div>
    </div><!-- Row display Medias -->

@endsection
