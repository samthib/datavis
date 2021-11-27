@extends('layouts.master')

@section('content')

  <!-- Hero image -->
  <div class="hero-img position-relative overflow-hidden text-white text-center shadow vh-100">
    <div class="col-md-5 p-lg-5 mx-auto my-5">
      <h1 class="display-4 font-weight-normal">{{ $design->title }}</h1>
      <p class="lead font-weight-normal">{{ $design->subtitle }}</p>
      <div>{!! $design->description !!}</div>
      <br><br>
      <a class="text-dark" href="#charts-container" role="button"><i class="fa fa-chevron-circle-down fa-4x" aria-hidden="true"></i></a>
    </div>
  </div><!-- Hero image -->

  <!-- Container -->
  <div class="container-fluid text-white" id="charts-container">
    @foreach ($charts as $key => $chart)
      <!-- Graph & Description Row -->
      <div class="row shadow">
        <!-- Graph part -->
        <div class="col-12 col-md-6 bg-dark d-flex flex-column align-items-center justify-content-end px-lg-5">
          <h2 class="display-5 py-3">{{ $chart->title }}</h2>
          <!-- Responsive Iframe container -->
          <div class="embed-responsive embed-responsive-16by9 shadow w-100">
            <iframe class="embed-responsive-item iframe-chart" style="border-radius: 21px 21px 0 0;" src="{{ route('charts.shadow', $chart) }}" allowfullscreen scrolling="no"></iframe>
          </div><!-- Responsive Iframe container -->
        </div><!-- Graph part -->

        <!-- Description part -->
        <div class="col-12 col-md-6 d-flex flex-column align-items-center justify-content-start px-lg-5">
          <div class="bg-dark overflow-auto text-center shadow w-100" style="min-height: 300px; border-radius: 0 0 21px 21px;">
            <h4 class="display-5 pt-5">{{ $chart->subtitle }}</h4>
            <p class="py-2 px-3 px-md-4">{{ substr($chart->description, 0, 350).' ...' }}</p>
          </div>
          <a class="btn btn-outline-dark btn-lg my-1 p-1" href="{{ route('charts.show', $chart)  }}" role="button">Voir plus</a>
        </div><!-- Description part -->
      </div><!-- Graph & Description Row -->
    @endforeach
  </div><!-- Container -->

  <!-- Pagination -->
  <div class="d-flex justify-content-center pt-5">
    {{ $charts->links() }}
  </div>

@endsection
