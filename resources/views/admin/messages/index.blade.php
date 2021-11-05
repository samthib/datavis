@extends('layouts.admin')

@section('admin-content')

  <x-admin.header.index-component name="{{ __('Message') }}" plural-name="{{ __('Messages') }}" :create-link="route('admin.messages.create')" />

  <div class="table-responsive">
    <table class="table table-dark table-bordered table-striped table-hover table-responsive-md">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Subject</th>
          <th>Message</th>
          <th>Date</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($messages as $key => $message)
          <tr>
            <td class="align-middle"><b>{{ $message->id }}</b></td>
            <td class="align-middle">{{ Str::limit($message->name, 20) }}</td>
            <td class="align-middle"><a href="mailto:{{ $message->email }}" target="_blank">{{ Str::limit($message->email, 20) }}</a></td>
            <td class="align-middle">{{ Str::limit($message->subject, 20) }}</td>
            <td class="align-middle">{{ Str::limit(strip_tags($message->message), 20) }}</td>
            <td class="align-middle">{{ $message->created_at->format('Y-m-d h:i') }}</td>
            <td class="text-center">
              <x-admin.table.button-show-component :show-link="route('admin.messages.show', $message)" />
              <x-admin.table.button-delete-component :key="$key" />
            </td>
          </tr>

          <x-admin.table.modal-delete-component :key="$key" name="{{ __('message') }}" :destroy-link="route('admin.messages.destroy', $message)" />

        @endforeach
      </tbody>
    </table>
  </div>

  <!-- Pagination -->
  <div class="d-flex justify-content-center pt-5">
    {{ $messages->links() }}
  </div>

@endsection
