@extends('layouts.master')

@section('content')

  {{-- Services --}}
  <div class="d-md-flex flex-md-equal w-100 vh-100 text-white">
    {{-- Services part --}}
    <div class="bg-dark py-1 pt-md-3 pb-md-5 text-center overflow-hidden">
      <h2 class="display-5 my-5 py-3">Services</h2>
      <div class="mx-auto w-75 row">

        @foreach ($pages as $key => $page)

          <div class="col-md-6 col-lg-4 mb-4 feature-card">
            <div class="card bg-transparent shadow rounded">
              <div class="card-body">
                <i class="{{ $page->icon }} fa-5x" aria-hidden="true"></i>
                <h3 class="card-title">{{ $page->title }}</h3>
                <h5 class="card-subtitle mb-2 text-muted">{{ $page->subtitle }}</h5>
                <a href="{!! route('pages.show', $page) !!}" class="card-link stretched-link"></a>
              </div>
            </div>
          </div>

        @endforeach

      </div>
    </div>{{-- Services part --}}
  </div>{{-- Services --}}

@endsection
