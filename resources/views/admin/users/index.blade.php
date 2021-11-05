@extends('layouts.admin')

@section('admin-content')

  <x-admin.header.index-component name="{{ __('User') }}" plural-name="{{ __('Users') }}" :create-link="route('admin.users.create')" />

  <div class="table-responsive">
    <table class="table table-dark table-bordered table-striped table-hover table-responsive-md">
      <thead>
        <tr>
          <th>#</th>
          <th class="text-center">Avatar</th>
          <th>Name</th>
          <th>Email</th>
          <th>Team</th>
          <th>Date</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $key => $user)
          <tr>
            <td class="align-middle"><b>{{ $user->id }}</b></td>
            <td class="align-middle text-center" style="min-width:100px"><img height="50px" src="{!! asset($user->profile_photo_path) !!}" alt=""></td>
            <td class="align-middle">{{ Str::limit($user->name, 20) }}</td>
            <td class="align-middle"><a href="mailto:{{ $user->email }}">{{ Str::limit($user->email, 20) }}</a></td>
            <td class="align-middle">{{ $user->current_team_id }}</td>
            <td class="align-middle">{{ $user->created_at->format('Y-m-d h:i') }}</td>
            <td class="text-center">
              <x-admin.table.button-edit-component :edit-link="route('admin.users.edit', $user)" />
              <x-admin.table.button-delete-component :key="$key" />
            </td>
          </tr>

          <x-admin.table.modal-delete-component :key="$key" name="{{ __('user') }}" :destroy-link="route('admin.users.destroy', $user)" />

        @endforeach
      </tbody>
    </table>
  </div>

  <!-- Pagination -->
  <div class="d-flex justify-content-center pt-5">
    {{ $users->links() }}
  </div>

@endsection
