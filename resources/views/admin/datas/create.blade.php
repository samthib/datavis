@extends('layouts.admin')

@section('admin-content')

  <x-admin.header.create-component plural-name="{{ __('Datas') }}" title="{{ __('New Data') }}" :index-link="route('admin.datas.index')" />


  <form id="form" action="{{ route('admin.datas.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <!--Form inputs upper row -->
    <div class="row">

      <!-- Data name -->
      <div class="form-group col-md-4">
        <label for="name">Name</label>
        <input id="name" name="name" type="text" class="form-control" value="{{ old('name') }}" required>
      </div><!-- Data name -->

      <!-- Data type -->
      <div class="form-group col-md-2">
        <label for="type">Type</label>
        <select id="type" name="type" type="text" class="form-control" required>
          <option {{ old('type') == 'JSON' ? 'selected' : '' }}>JSON</option>
          <option {{ old('type') == 'CSV' ? 'selected' : '' }}>CSV</option>
          <option {{ old('type') == 'TSV' ? 'selected' : '' }}>TSV</option>
          <option {{ old('type') == 'EXCEL' ? 'selected' : '' }}>EXCEL</option>
          <option {{ old('type') == 'TEXT' ? 'selected' : '' }}>TEXT</option>
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
        <button type="submit" form="form" class="btn btn-primary mr-1">Save</button>
        <a href="{{ route('admin.datas.index') }}" class="btn btn-danger">Cancel</a>
      </div><!-- Form buttons -->

      <!-- Description -->
      <div class="form-group col-md-6">
        <label for="description">Description</label>
        <textarea id="description" class="form-control" name="description" rows="5">{{ old('description') }}</textarea>
      </div><!-- Description -->


    </div><!--Form inputs upper row -->

  </form>


@endsection
