@extends('layouts.admin')

@section('admin-content')

  <x-admin.header.create-component plural-name="{{ __('Pages') }}" title="{{ __('New Page') }}" :index-link="route('admin.pages.index')" />


  <form id="form" action="{{ route('admin.pages.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <!--Form inputs upper row -->
    <div class="row">

      <!-- Site title -->
      <div class="form-group col-md-4">
        <label for="title">Title</label>
        <input id="title" name="title" type="text" class="form-control" value="{{ old('title') }}" required>
      </div><!-- Site title -->

      <!-- Site subtitle -->
      <div class="form-group col-md-4">
        <label for="subtitle">Subtitle</label>
        <input id="subtitle" name="subtitle" type="text" class="form-control" value="{{ old('subtitle') }}">
      </div><!-- Site subtitle -->

      <!-- Site icon -->
      <div class="form-group col-md-2">
        <label for="icon">Icon <a href="https://fontawesome.com/v4.7/" target="_blank">Font awesome <span data-feather="external-link"></span></a></label>
        <input id="icon" name="icon" type="text" class="form-control" placeholder="fa fa-user" value="{{ old('icon') }}">
      </div><!-- Site icon -->

      <!-- Form buttons -->
      <div class="form-group col-md-2 d-flex align-items-end justify-content-end">
        <!-- Action buttons -->
        <button type="submit" form="form" class="btn btn-primary mr-1">Save</button>
        <a href="{{ route('admin.pages.index') }}" class="btn btn-danger">Cancel</a>
      </div><!-- Form buttons -->

      <!-- HTML Editor -->
      <div class="form-group col-md-12">
        <p>HTML</p>
        <pre id="modifyCodeHTML" class="vh-100 rounded">{!! old('content') ?? "<!-- Write your code ... -->" !!}</pre>
        <textarea id="textareaHTML" class="textInput" name="content" hidden>{!! old('content') !!}</textarea>
      </div><!-- HTML Editor -->


  </div><!--Form inputs upper row -->

</form>


    @include('admin.pages.partials.scripts')

@endsection
