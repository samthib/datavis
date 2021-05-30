@extends('layouts.admin')

@section('admin-content')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Datas</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <a class="btn btn-success" href="{!! route('admin.datas.create') !!}" role="button"><span data-feather="plus-circle"></span> New Data</a>
      </div>
    </div>
  </div>


  <h3 class="text-center">Datas list</h3>
  
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
            <td>{{ $data->name }}</td>
            <td>{{ $data->type }}</td>
            <td><a href="{!! url('storage/'.$data->file) !!}" target="_blank">{!! url('storage/'.$data->file) !!}</a></td>
            <td>{{ (strlen($data->description) > 15) ? substr($data->description, 0, 15).' ...' : $data->description }}</td>
            <td>{{ $data->created_at->format('Y-m-d h:i') }}</td>
            <td class="text-center">
              <a class="btn btn-warning" href="{!! route('admin.datas.show', $data) !!}" role="button">
                <span data-feather="eye"></span>
              </a>
              <a class="btn btn-primary" href="{!! route('admin.datas.edit', $data) !!}" role="button">
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
                  <h5 class="modal-title" id="deleteModal-{{$key}}">Delete data</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Are you sure ?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                  <form action="{!! route('admin.datas.destroy', $data) !!}" method="post">
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

@endsection
