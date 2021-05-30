@extends('layouts.admin')

@section('admin-content')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Datas</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <a class="btn btn-secondary" href="{!! route('admin.datas.index') !!}" role="button"><span data-feather="list"></span> Datas list</a>
      </div>
    </div>
  </div>

  <h3 class="text-center">{{ __('New Data') }}</h3>


  <form id="form" action="{{ route('admin.datas.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <!--Form inputs upper row -->
    <div class="row">

      <!-- Data name -->
      <div class="form-group col-md-4">
        <label for="name">Name</label>
        <input id="name" name="name" type="text" class="form-control" required>
      </div><!-- Data name -->

      <!-- Data type -->
      <div class="form-group col-md-2">
        <label for="type">Type</label>
        <select id="type" name="type" type="text" class="form-control" required>
          <option>JSON</option>
          <option>CSV</option>
          <option>TSV</option>
          <option>EXCEL</option>
          <option>TEXT</option>
        </select>
      </div><!-- Data type -->

      <!-- Data file -->
      <div class="form-group col-md-4">
        <label for="file">Data file</label>
        <input id="file" name="file" type="file" class="form-control-file" required>
      </div><!-- Data file -->

      <!-- Form buttons -->
      <div class="form-group col-md-2 d-flex align-items-end justify-content-end">
        <!-- Action buttons -->
        <button type="submit" form="form" class="btn btn-primary mr-1" id="updateSlideElementTypeBtn">Save</button>
        <a href="{{ route('admin.datas.index') }}" class="btn btn-danger">Cancel</a>
      </div><!-- Form buttons -->

      <!-- Description -->
      <div class="form-group col-md-6">
        <label for="description">Description</label>
        <textarea id="description" class="form-control" name="description" rows="5"></textarea>
      </div><!-- Description -->


    </div><!--Form inputs upper row -->

  </form>


@endsection
