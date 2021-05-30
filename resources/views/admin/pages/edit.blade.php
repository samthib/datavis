@extends('layouts.admin')

@section('admin-content')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Pages</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <a class="btn btn-secondary" href="{!! route('admin.pages.index') !!}" role="button"><span data-feather="list"></span> Pages list</a>
      </div>
    </div>
  </div>

  <h3 class="text-center">{{ $page->title }}</h3>


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
        <label for="icon">Icon (Font awesome)</label>
        <input id="icon" name="icon" type="text" class="form-control" value="{{ $page->icon }}">
      </div><!-- Site icon -->

      <!-- Content -->
      <div class="form-group col-md-12">
        <label for="content">Content</label>
        <textarea id="content" class="form-control" name="content" rows="15">{{ $page->content }}</textarea>
      </div><!-- Content -->

    </div><!--Form inputs upper row -->

  </form>


@endsection
