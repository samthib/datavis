@extends('layouts.admin')

@section('admin-content')

  <x-admin.header.index-component name="{{ __('Page') }}" plural-name="{{ __('Pages') }}" :create-link="route('admin.pages.create')" />

  <div class="table-responsive">
    <table class="table table-dark table-bordered table-striped table-hover table-responsive-md">
      <thead>
        <tr>
          <th>#</th>
          <th>Icon</th>
          <th>Title</th>
          <th>Content</th>
          <th>Date</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($pages as $key => $page)
          <tr>
            <td class="align-middle"><b>{{ $page->id }}</b></td>
            <td class="align-middle text-center"><i class="{{ $page->icon }} fa-4x"></i></td>
            <td class="align-middle">{{ Str::limit($page->title, 20) }}</td>
            <td class="align-middle">{{ Str::limit(strip_tags($page->content), 20) }}</td>
            <td class="align-middle">{{ $page->created_at->format('Y-m-d h:i') }}</td>
            <td class="align-middle text-center">
              <x-admin.table.button-show-component :show-link="route('admin.pages.show', $page)" />
              <x-admin.table.button-edit-component :edit-link="route('admin.pages.edit', $page)" />
              <x-admin.table.button-delete-component :key="$key" />
            </td>
          </tr>

          <x-admin.table.modal-delete-component :key="$key" name="{{ __('page') }}" :destroy-link="route('admin.pages.destroy', $page)" />

        @endforeach
      </tbody>
    </table>
  </div>

  <!-- Pagination -->
  <div class="d-flex justify-content-center pt-5">
    {{ $pages->links() }}
  </div>

@endsection
