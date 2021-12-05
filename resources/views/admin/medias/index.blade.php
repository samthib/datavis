@extends('layouts.admin')

@section('admin-content')

  <x-admin.header.index-component name="{{ __('Media') }}" plural-name="{{ __('Medias') }}" :create-link="route('admin.medias.create')" />

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
        @foreach ($medias as $key => $media)
          <tr>
            <td><b>{{ $media->id }}</b></td>
            <td>{{ Str::limit($media->name, 20) }}</td>
            <td>{{ $media->type }}</td>
            <td><a href="{!! url('storage/'.$media->file) !!}" target="_blank">{{ Str::limit(url('storage/'.$media->file), 40) }}</a></td>
            <td>{{ Str::limit($media->description, 20) }}</td>
            <td>{{ $media->created_at->format('Y-m-d h:i') }}</td>
            <td class="text-center">
              <x-admin.table.button-show-component :show-link="route('admin.medias.show', $media)" />
              <x-admin.table.button-edit-component :edit-link="route('admin.medias.edit', $media)" />
              <x-admin.table.button-delete-component :key="$key" />
            </td>
          </tr>

          <x-admin.table.modal-delete-component :key="$key" name="{{ __('media') }}" :destroy-link="route('admin.medias.destroy', $media)" />

        @endforeach
      </tbody>
    </table>
  </div>

@endsection
