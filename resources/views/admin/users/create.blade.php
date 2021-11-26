@extends('layouts.admin')

@section('admin-content')

  <x-admin.header.create-component plural-name="{{ __('Users') }}" title="{{ __('New User') }}" :index-link="route('admin.users.index')" />


  <form id="form" action="{{ route('admin.users.store') }}" method="post">
    @csrf

    <!--Form inputs upper row -->
    <div class="row">
    
      <!-- User name -->
      <div class="form-group col-md-4">
        <label for="name">{{ __('Name') }}</label>
        <input id="name" name="name" type="text" class="form-control" value="{{ old('name') }}">
      </div><!-- User name -->
    
      <!-- User email -->
      <div class="form-group col-md-4">
        <label for="email">{{ __('Email') }}</label>
        <input id="email" name="email" type="text" class="form-control" value="{{ old('email') }}">
      </div><!-- User email -->
    
      <!-- Checkbox verified-->
      <div class="form-group col-md-2 d-flex align-items-end">
        <label for="verified">
          <span>{{ __('Verified') }}</span>
          <input id="verified" name="verified" type="checkbox" disabled/>
        </label>
      </div><!-- Checkbox verified-->
    
      <!-- Form buttons -->
      <div class="form-group col-md-2 d-flex align-items-end justify-content-end">
        <!-- Action buttons -->
        <button type="submit" form="form" class="btn btn-primary mr-1">Save</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-danger">Cancel</a>
      </div><!-- Form buttons -->
    
      <!-- User password -->
      <div class="form-group col-md-4">
        <label for="password">{{ __('Password') }}</label>
        <input id="password" name="password" type="password" class="form-control">
      </div><!-- User password -->

      <!-- User password confirmation -->
      <div class="form-group col-md-4">
        <label for="password_confirmation">{{ __('Password confirmation') }}</label>
        <input id="password_confirmation" name="password_confirmation" type="password" class="form-control">
      </div><!-- User password confirmation -->

    </div>
    <!--Form inputs upper row -->

  </form>


@endsection
