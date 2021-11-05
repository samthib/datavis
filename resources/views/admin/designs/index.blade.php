@extends('layouts.admin')

@section('admin-content')

  <x-admin.header.index-component name="{{ __('Design') }}" plural-name="{{ __('Designs') }}" :create-link="route('admin.designs.create')" />

  <div class="table-responsive">
    <table class="table table-dark table-bordered table-striped table-hover table-responsive-md">
      <thead>
        <tr>
          <th>#</th>
          <th>Active</th>
          <th class="text-center">View</th>
          <th>Title</th>
          <th>Hero</th>
          <th>Logo</th>
          <th>Color</th>
          <th>Date</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($designs as $key => $design)
          <tr>
            <td class="align-middle"><b>{{ $design->id }}</b></td>
            <td class="align-middle text-center text-success"><h2 class="text-success">{!! ($design->active == 1) ? '&check;' : '' !!}</h2></td>
            <td class="align-middle text-center" style="min-width:200px;">
              <div class="embed-responsive embed-responsive-16by9 text-center">
                <iframe class="embed-responsive-item" style="border-radius: 2px;" src="{{ route('admin.designs.shadow', $design) }}"  scrolling="no"></iframe>
              </div>
            </td>
            <td class="align-middle">{{ Str::limit($design->title, 20) }}</td>
            <td class="align-middle text-center"><img class="img-fluid" style="max-height:100px" src="{{ asset('storage/'.$design->hero) }}" alt="Hero"></td>
            <td class="align-middle text-center"><img class="img-fluid" style="max-height:100px" src="{{ asset('storage/'.$design->logo) }}" alt="Logo"></td>
            <td class="align-middle"><b style="color:{{ $design->color }}">{{ $design->color }}</b></td>
            <td class="align-middle">{{ $design->created_at->format('Y-m-d h:i') }}</td>
            <td class="align-middle text-center">
              <x-admin.table.button-show-component :show-link="route('admin.designs.show', $design)" />
              <x-admin.table.button-edit-component :edit-link="route('admin.designs.edit', $design)" />
              <x-admin.table.button-delete-component :key="$key" />
            </td>
          </tr>

          <x-admin.table.modal-delete-component :key="$key" name="{{ __('design') }}" :destroy-link="route('admin.designs.destroy', $design)" />

        @endforeach
      </tbody>
    </table>
  </div>

  <!-- Pagination -->
  <div class="d-flex justify-content-center pt-5">
    {{ $designs->links() }}
  </div>

@endsection
