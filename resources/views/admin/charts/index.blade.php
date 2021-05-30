@extends('layouts.admin')

@section('admin-content')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Charts</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <a class="btn btn-success" href="{!! route('admin.charts.create') !!}" role="button"><span data-feather="plus-circle"></span> New Chart</a>
      </div>
    </div>
  </div>


  <h3 class="text-center">Charts list</h3 class="text-center">
  <div class="table-responsive">
    <table class="table table-dark table-bordered table-striped table-hover table-responsive-md">
      <thead>
        <tr>
          <th>#</th>
          <th>Active</th>
          <th class="text-center">View</th>
          <th>Title</th>
          <th>Subtitle</th>
          <th>Date</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($charts as $key => $chart)
          <tr>
            <td class="align-middle"><b>{{ $chart->id }}</b></td>
            <td class="align-middle text-center text-success"><h2 class="text-success">{!! ($chart->available == 1) ? '&check;' : '' !!}</h2></td>
            <td class="align-middle text-center" style="min-width:200px">
              <div class="embed-responsive embed-responsive-16by9 text-center">
                <iframe class="embed-responsive-item iframe-chart" style="border-radius: 2px;" src="{{ route('charts.shadow', $chart) }}" allowfullscreen scrolling="no"></iframe>
              </div>
            </td>
            <td class="align-middle">{{ $chart->title }}</td>
            <td class="align-middle">{{ $chart->subtitle }}</td>
            <td class="align-middle">{{ $chart->created_at->format('Y-m-d h:i') }}</td>
            <td class="align-middle text-center">
              <a class="btn btn-warning" href="{!! route('admin.charts.show', $chart) !!}" role="button">
                <span data-feather="eye"></span>
              </a>
              <a class="btn btn-primary" href="{!! route('admin.charts.edit', $chart) !!}" role="button">
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
                  <h5 class="modal-title" id="deleteModal-{{$key}}">Delete chart</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Are you sure ?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                  <form action="{!! route('admin.charts.destroy', $chart) !!}" method="post">
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
    {{ $charts->links() }}
  </div>

@endsection
