@extends('layouts.master')

@section('content')

  <!-- About -->
  <div class="bg-dark d-md-flex flex-md-equal text-white min-vh-100">
    <!-- About part -->
    <div class="py-1 pt-md-3 pb-md-5 text-center">
      <h2 class="display-5 my-md-5 py-3">{!! $page->title ?? '' !!}</h2>
      <div class="mx-auto w-75 row">
        {!! $page->content ?? '' !!}
      </div>

        <a class="btn btn-outline-light btn-lg my-1 my-md-3 my-lg-5" href="{!! route('messages.create') !!}" role="button">Contactez moi</a>

    </div><!-- About part -->
  </div><!-- About -->

@endsection
