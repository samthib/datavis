@extends('layouts.admin')

@section('admin-content')

  <x-admin.header.show-component name="{{ __('Page') }}" plural-name="{{ __('Pages') }}" :title="$page->title" :index-link="route('admin.pages.index')" :create-link="route('admin.pages.create')" />

  <form id="form" action="{{ route('admin.pages.update', $page) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!--Form inputs upper row -->
    <div class="row">

      <!-- Site title -->
      <div class="form-group col-md-8">
        <label for="title">Title</label>
        <input id="title" name="title" type="text" class="form-control" value="{{ $page->title }}" required>
      </div><!-- Site title -->

      <!-- Form buttons -->
      <div class="form-group offset-md-2 col-md-2 d-flex align-items-end justify-content-end">
        <!-- Action buttons -->
        <button type="submit" form="form" class="btn btn-primary mr-1" id="updateSlideElementTypeBtn">Save</button>
        <a href="{{ route('admin.pages.index') }}" class="btn btn-danger">Cancel</a>
      </div><!-- Form buttons -->

      <!-- Site subtitle -->
      <div class="form-group col-md-6">
        <label for="subtitle">Subtitle</label>
        <input id="subtitle" name="subtitle" type="text" class="form-control" value="{{ $page->subtitle }}">
      </div><!-- Site subtitle -->

      <!-- Site icon -->
      <div class="form-group col-md-6">
        <label for="icon">Icon <a href="https://fontawesome.com/v4.7/" target="_blank">Font awesome <span data-feather="external-link"></span></a></label>
        <input id="icon" name="icon" type="text" class="form-control" value="{{ $page->icon }}" placeholder="fa fa-user">
      </div><!-- Site icon -->

      <!-- Content -->
      <div class="form-group col-md-12">
        <label for="content">Content</label>
        <textarea id="content" class="form-control" name="content" rows="15">{{ $page->content }}</textarea>
      </div><!-- Content -->

    </div><!--Form inputs upper row -->

  </form>


@endsection
