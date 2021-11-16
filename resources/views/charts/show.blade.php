@extends('layouts.master')

@section('content')

  <!-- Graph -->
  <div class="d-md-flex flex-md-equal w-100 text-white">
    <!-- Graph part -->
    <div class="bg-dark py-1 pt-md-3 pb-md-5 text-center overflow-hidden shadow">
      <h2 id="title-chart" class="display-5 my-1 py-3 title-chart">{{ $chart->title }}</h2>

      <!-- Modal button container -->
      <div class="row justify-content-end p-1">
        <div class="col-md-4">
          <button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#modal-chart">
            <i class="fa fa-expand" aria-hidden="true"></i>
          </button>
        </div>
      </div><!-- Modal button container -->

      <!-- Modal  -->
      <div class="modal fade" id="modal-chart" tabindex="-1" aria-labelledby="modal-chart" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
          <div class="modal-content">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" style="border-radius: 21px;" src="{{ route('charts.shadow', $chart) }}" allowfullscreen scrolling="no"></iframe>
            </div>
          </div>
        </div>
      </div><!-- Modal  -->

      <!-- Responsive Iframe container -->
      <div class="container-fluid">
        <div class="row d-flex justify-content-center">
          <div class="col-md-8">
            <!-- Button trigger modal -->
            <div class="embed-responsive embed-responsive-16by9">
              <iframe id="iframe-chart" class="embed-responsive-item iframe-chart" style="border-radius: 21px;" src="{{ route('charts.shadow', $chart) }}" allowfullscreen scrolling="no"></iframe>
            </div>
          </div>
        </div>
      </div><!-- Responsive Iframe container -->

      <div class="d-flex justify-content-center align-items-center mt-1 mt-md-4">
        <button id="generatePDF" type="submit" class="btn btn-light btn-lg" name="button" onclick="graphToPDF('.iframe-chart', '.title-chart', '#graph')">Télécharger PDF</button>
      </div>

    </div><!-- Graph part -->
  </div><!-- Graph -->


  <!-- Code & Description -->
  <div class="d-md-flex flex-md-equal w-100">
    <!-- Container -->
    <div class="container-fluid text-white">
        <!-- Code & Description Row -->
        <div class="row">
          <!-- Description part -->
          <div class="col-12 col-md-6 d-flex flex-column align-items-center justify-content-start px-md-5">
            <div class="bg-dark shadow overflow-auto text-center w-100" style="height: 600px; border-radius: 0 0 21px 21px;">
              <h4 class="display-5 pt-5">{{ $chart->subtitle }}</h4>
              <p class="py-5 px-3 px-md-4">{{ $chart->description }}</p>
            </div>
            <a class="btn btn-outline-dark btn-lg my-1 p-1" href="{{ route('charts.index')  }}" role="button">Retour</a>
          </div><!-- Description part -->

          <!-- Code part -->
          <div class="col-12 col-md-6 d-flex flex-column align-items-center justify-content-end px-md-5">
            <h2 class="display-5 py-3 text-dark">Code Javascript</h2>
            <div class="bg-dark shadow overflow-auto text-center w-100" style="height: 600px; border-radius: 21px 21px 0 0;">
              <pre class="m-0 h-100"><code class="javascript text-left h-100">{!! $chart->js !!}</code></pre>
            </div>
          </div><!-- Code part -->
        </div><!-- Code & Description Row -->
    </div><!-- Container -->
  </div><!-- Code & Description -->


@endsection
