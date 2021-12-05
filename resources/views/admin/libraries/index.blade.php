@extends('layouts.admin')

@section('admin-content')

  <x-admin.header.index-component name="{{ __('Library') }}" plural-name="{{ __('Libraries') }}" :create-link="route('admin.libraries.create')" />

  <div class="table-responsive">
    <table class="table table-dark table-bordered table-striped table-hover table-responsive-md">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Type</th>
          <th>Description</th>
          <th>Link</th>
          <th>Date</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($libraries as $key => $library)
          <tr>
            <td class="align-middle"><b>{{ $library->id }}</b></td>
            <td class="align-middle">{{ Str::limit($library->name, 20) }}</td>
            <td class="align-middle">{{ Str::limit($library->type, 20) }}</td>
            <td class="align-middle">{{ Str::limit($library->description, 20) }}</td>
            <td class="align-middle"><a href="{{ $library->link }}" target="_blank">{{ Str::limit($library->link, 40) }}</a></td>
            <td class="align-middle">{{ $library->created_at->format('Y-m-d h:i') }}</td>
            <td class="text-center">
              <x-admin.table.button-show-component :show-link="route('admin.libraries.show', $library)" />
              <x-admin.table.button-edit-component :edit-link="route('admin.libraries.edit', $library)" />
              <x-admin.table.button-delete-component :key="$key" />
            </td>
          </tr>

          <x-admin.table.modal-delete-component :key="$key" name="{{ __('library') }}" :destroy-link="route('admin.libraries.destroy', $library)" />

        @endforeach
      </tbody>
    </table>
  </div>

  <!-- Pagination -->
  <div class="d-flex justify-content-center pt-5">
    {{ $libraries->links() }}
  </div>

@endsection
