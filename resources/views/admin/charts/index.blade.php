@extends('layouts.admin')

@section('admin-content')

  <x-admin.header.index-component name="{{ __('Chart') }}" plural-name="{{ __('Charts') }}" :create-link="route('admin.charts.create')" />

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
            <td class="align-middle">{{ Str::limit($chart->title, 20) }}</td>
            <td class="align-middle">{{ Str::limit($chart->subtitle, 20) }}</td>
            <td class="align-middle">{{ $chart->created_at->format('Y-m-d h:i') }}</td>
            <td class="align-middle text-center">
              <x-admin.table.button-show-component :show-link="route('admin.charts.show', $chart)" />
              <x-admin.table.button-edit-component :edit-link="route('admin.charts.edit', $chart)" />
              <x-admin.table.button-delete-component :key="$key" /><!-- Button trigger modal -->
            </td>
          </tr>

          <x-admin.table.modal-delete-component :key="$key" name="{{ __('chart') }}" :destroy-link="route('admin.charts.destroy', $chart)" /><!-- Delete Modal -->

        @endforeach
      </tbody>
    </table>
  </div>

  <!-- Pagination -->
  <div class="d-flex justify-content-center pt-5">
    {{ $charts->links() }}
  </div>

@endsection
