@extends('layouts.admin')

@section('admin-content')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Pages</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <a class="btn btn-success" href="{!! route('admin.pages.create') !!}" role="button"><span data-feather="plus-circle"></span> New Page</a>
      </div>
    </div>
  </div>


  <h3 class="text-center">Pages list</h3 class="text-center">
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
            <td class="align-middle">{{ $page->title }}</td>
            <td class="align-middle">{{ (strlen( $page->content) > 80) ? substr( $page->content, 0, 80).' ...' :  $page->content }}</td>
            <td class="align-middle">{{ $page->created_at->format('Y-m-d h:i') }}</td>
            <td class="align-middle text-center">
              <a class="btn btn-warning" href="{!! route('admin.pages.show', $page) !!}" role="button">
                <span data-feather="eye"></span>
              </a>
              <a class="btn btn-primary" href="{!! route('admin.pages.edit', $page) !!}" role="button">
                <span data-feather="edit"></span>
              </a>
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
                  <h5 class="modal-title" id="deleteModal-{{$key}}">Delete page</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Are you sure ?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                  <form action="{!! route('admin.pages.destroy', $page) !!}" method="post">
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
    {{ $pages->links() }}
  </div>

@endsection
