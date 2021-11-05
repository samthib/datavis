@extends('layouts.admin')

@section('admin-content')

  <x-admin.header.show-component name="{{ __('Message') }}" plural-name="{{ __('Messages') }}" :title="$message->name.' - '.$message->email" :index-link="route('admin.messages.inbox.index')" :create-link="route('admin.messages.create')" />

  <form id="form" action="{{ route('admin.messages.store') }}" method="post">
    @csrf
    <!--Form inputs upper row -->
    <div class="row">

      <!-- Graphic name -->
      <div class="form-group col-md-4">
        <label for="name">Name</label>
        <input id="name" name="name" type="text" class="form-control" value="{{ $message->name }}" readonly>
      </div><!-- Graphic name -->

      <!-- Email -->
      <div class="form-group col-md-4">
        <label for="email">Email</label>
        <input id="email" name="email" type="text" class="form-control" value="{{ $message->email }}" readonly>
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
        <input id="subject" name="subject" type="text" class="form-control" value="{{ $message->subject }}" readonly>
      </div><!-- Subject -->

      <!-- Message -->
      <div class="form-group col-md-8">
        <label for="message">Message</label>
        <div class="form-control" style="height: 250px; overflow: auto" readonly>
          @if ($message->sent)
            {!! $message->message !!}
          @else
            {{ $message->message }}
          @endif
        </div>
      </div><!-- Message -->


    </div><!--Form inputs upper row -->

  </form>


@endsection
