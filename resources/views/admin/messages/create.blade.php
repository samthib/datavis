@extends('layouts.admin')

@section('admin-content')

  <x-admin.header.create-component plural-name="{{ __('Messages') }}" title="{{ __('New Message') }}" :index-link="route('admin.messages.sent.index')" />


  <form id="form" action="{{ route('admin.messages.store') }}" method="post">
    @csrf

    <!--Form inputs upper row -->
    <div class="row">

      <!-- Name -->
      <div class="form-group col-md-4">
        <label for="name">Name</label>
        <input id="name" name="name" type="text" class="form-control" value="{{ old('name') }}" required>
      </div><!-- Name -->

      <!-- Email -->
      <div class="form-group col-md-4">
        <label for="email">Email</label>
        <input id="email" name="email" type="text" class="form-control" value="{{ old('email') }}" required>
      </div><!-- Email -->

      <!-- Form buttons -->
      <div class="form-group col-md-4 d-flex align-items-end justify-content-end">
        <!-- Action buttons -->
        <button type="submit" form="form" class="btn btn-primary mr-1">Send</button>
        <a href="{{ route('admin.messages.inbox.index') }}" class="btn btn-danger">Cancel</a>
      </div><!-- Form buttons -->

      <!-- Subject -->
      <div class="form-group col-md-8">
        <label for="subject">Subject</label>
        <input id="subject" name="subject" type="text" class="form-control" value="{{ old('subject') }}" required>
      </div><!-- Subject -->

      <!-- Message -->
      <div class="form-group col-md-8">
        <label for="message">Message</label>
        <textarea id="message" name="message" hidden>{!! old('message') !!}</textarea>
        <div id="quill-editor" class="form-control" style="height: 250px;">{!! old('message') !!}</div>
      </div><!-- Message -->

      <input type="number" name="sent" value="1" hidden>

    </div><!--Form inputs upper row -->
  </form>

@endsection
