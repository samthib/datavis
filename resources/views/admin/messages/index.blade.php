@extends('layouts.admin')

@section('admin-content')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Messages</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <a class="btn btn-success" href="{!! route('admin.messages.create') !!}" role="button"><span data-feather="plus-circle"></span> New Message</a>
      </div>
    </div>
  </div>


  <h3 class="text-center">Messages list</h3>
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
              <a class="btn btn-warning" href="{!! route('admin.messages.show', $message) !!}" role="button">
                <span data-feather="eye"></span>
              </a>
              {{-- <a class="btn btn-primary" href="{!! route('admin.messages.edit', $message) !!}" role="button">
                <span data-feather="edit"></span>
              </a> --}}
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{$key}}">
                <span data-feather="trash"></span>
              </button>
            </td>
          </tr>


          <!-- Modal -->
          <div class="modal fade" id="deleteModal-{{$key}}" tabindex="-1" aria-labelledby="deleteModal-{{$key}}" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="deleteModal-{{$key}}">Delete message</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Are you sure ?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                  <form action="{!! route('admin.messages.destroy', $message) !!}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                      DELETE
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div><!-- Modal -->

        @endforeach
      </tbody>
    </table>
  </div>

  <!-- Pagination -->
  <div class="d-flex justify-content-center pt-5">
    {{ $messages->links() }}
  </div>

@endsection