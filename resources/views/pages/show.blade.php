@extends('layouts.master')

@section('content')

  <!-- About -->
  <div class="d-md-flex flex-md-equal w-100 vh-100 text-white">
    <!-- About part -->
    <div class="bg-dark py-1 pt-md-3 pb-md-5 text-center overflow-hidden">
      <h2 class="display-5 my-5 py-3">{!! $page->title ?? '' !!}</h2>
      <div class="mx-auto w-75 row">
        {!! $page->content ?? '' !!}
      </div>

        <a class="btn btn-outline-light btn-lg" href="{!! route('messages.create') !!}" role="button">Contactez moi</a>

    </div><!-- About part -->
  </div><!-- About -->

@endsection
