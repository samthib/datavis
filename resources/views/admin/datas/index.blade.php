@extends('layouts.admin')

@section('admin-content')

  <x-admin.header.index-component name="{{ __('Data') }}" plural-name="{{ __('Datas') }}" :create-link="route('admin.datas.create')" />

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
        @foreach ($datas as $key => $data)
          <tr>
            <td><b>{{ $data->id }}</b></td>
            <td>{{ Str::limit($data->name, 20) }}</td>
            <td>{{ $data->type }}</td>
            <td><a href="{!! url('storage/'.$data->file) !!}" target="_blank">{{ Str::limit(url('storage/'.$data->file), 60) }}</a></td>
            <td>{{ Str::limit($data->description, 20) }}</td>
            <td>{{ $data->created_at->format('Y-m-d h:i') }}</td>
            <td class="text-center">
              <x-admin.table.button-show-component :show-link="route('admin.datas.show', $data)" />
              <x-admin.table.button-edit-component :edit-link="route('admin.datas.edit', $data)" />
              <x-admin.table.button-delete-component :key="$key" />
            </td>
          </tr>

          <x-admin.table.modal-delete-component :key="$key" name="{{ __('data') }}" :destroy-link="route('admin.datas.destroy', $data)" />

        @endforeach
      </tbody>
    </table>
  </div>

@endsection
