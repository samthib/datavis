@extends('layouts.admin')

@section('admin-content')

  <x-admin.header.index-component name="{{ __('File') }}" plural-name="{{ __('Files') }}" :create-link="route('admin.files.create')" />

  <div class="table-responsive">
    <table class="table table-dark table-bordered table-striped table-hover table-responsive-md">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Type</th>
          <th>Link</th>
          <th>Description</th>
          <th>Date</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($files as $key => $file)
          <tr>
            <td><b>{{ $file->id }}</b></td>
            <td>{{ Str::limit($file->name, 20) }}</td>
            <td>{{ $file->type }}</td>
            <td><a href="{!! url('storage/'.$file->file) !!}" target="_blank">{{ Str::limit(url('storage/'.$file->file), 40) }}</a></td>
            <td>{{ Str::limit($file->description, 20) }}</td>
            <td>{{ $file->created_at->format('Y-m-d h:i') }}</td>
            <td class="text-center">
              <x-admin.table.button-show-component :show-link="route('admin.files.show', $file)" />
              <x-admin.table.button-edit-component :edit-link="route('admin.files.edit', $file)" />
              <x-admin.table.button-delete-component :key="$key" />
            </td>
          </tr>

          <x-admin.table.modal-delete-component :key="$key" name="{{ __('file') }}" :destroy-link="route('admin.files.destroy', $file)" />

        @endforeach
      </tbody>
    </table>
  </div>

@endsection
