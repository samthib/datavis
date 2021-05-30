@extends('layouts.admin')

@section('admin-content')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Messages</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <a class="btn btn-secondary" href="{!! route('admin.messages.inbox.index') !!}" role="button"><span data-feather="list"></span> Messages list</a>
      </div>
      <div class="btn-group mr-2">
        <a class="btn btn-success" href="{!! route('admin.messages.create') !!}" role="button"><span data-feather="plus-circle"></span> New Message</a>
      </div>
    </div>
  </div>

  <h3 class="text-center">{{ $message->name." - ".$message->email }}</h3>


  <form id="form" action="{{ route('admin.messages.store') }}" method="post">
    @csrf

    <!--Form inputs upper row -->
    <div class="row">

      <!-- Graphic name -->
      <div class="form-group col-md-4">
        <label for="name">Name</label>
        <input id="name" name="name" type="text" class="form-control" value="{{ $message->name }}" required>
      </div><!-- Graphic name -->

      <!-- Email -->
      <div class="form-group col-md-4">
        <label for="email">Email</label>
        <input id="email" name="email" type="text" class="form-control" value="{{ $message->email }}" required>
      </div><!-- Email -->

      <!-- Form buttons -->
      <div class="form-group col-md-4 d-flex align-items-end justify-content-end">
        <!-- Action buttons -->
        <button type="submit" form="form" class="btn btn-primary mr-1" id="updateSlideElementTypeBtn">Save</button>
        <a href="{{ route('admin.messages.inbox.index') }}" class="btn btn-danger">Cancel</a>
      </div><!-- Form buttons -->

      <!-- Subject -->
      <div class="form-group col-md-8">
        <label for="subject">Subject</label>
        <input id="subject" name="subject" type="text" class="form-control" value="{{ $message->subject }}" required>
      </div><!-- Subject -->

      <!-- Message -->
      <div class="form-group col-md-8">
        <label for="message">Message</label>
        <textarea id="message" class="form-control" name="message" rows="5">{{ $message->message }}</textarea>
      </div><!-- Message -->


    </div><!--Form inputs upper row -->

  </form>


@endsection
