@extends('layouts.admin')

@section('admin-content')

<x-admin.header.show-component name="{{ __('User') }}" plural-name="{{ __('Users') }}" :title="$user->title"
  :index-link="route('admin.users.index')" :create-link="route('admin.users.create')" />

<form id="form" action="{{ route('admin.users.update', $user) }}" method="post" enctype="multipart/form-data">
  @csrf
  @method('PUT')

  <!--Form inputs upper row -->
  <div class="row">

    <!-- Site name -->
    <div class="form-group col-md-4">
      <label for="name">{{ __('Name') }}</label>
      <input id="name" name="name" type="text" class="form-control" value="{{ $user->name }}">
    </div><!-- Site name -->

    <!-- Site email -->
    <div class="form-group col-md-4">
      <label for="email">{{ __('Email') }}</label>
      <input id="email" name="email" type="text" class="form-control" value="{{ $user->email }}">
    </div><!-- Site email -->

    <!-- Checkbox verified-->
    <div class="form-group col-md-2 d-flex align-items-end">
      <label for="verified">
        <span>{{ __('Verified') }}</span>
        <input id="verified" name="verified" type="checkbox" {{ $user->hasVerifiedEmail() ? 'checked' : ''}} disabled/>
      </label>
    </div><!-- Checkbox verified-->

    <!-- Form buttons -->
    <div class="form-group col-md-2 d-flex align-items-end justify-content-end">
      <!-- Action buttons -->
      <button type="submit" form="form" class="btn btn-primary mr-1">Save</button>
      <a href="{{ route('admin.users.index') }}" class="btn btn-danger">Cancel</a>
    </div><!-- Form buttons -->

    <!-- Avatar -->
    <div class="form-group col-md-4">
      <label class="w-100" for="photo">{{ __('Avatar') }}</label>
      <img class="img-fluid" style="max-height:350px" src="{{ $user->getProfilePhotoUrlAttribute() /*Trait vendor\laravel\jetstream\src\HasProfilePhoto.php*/}}" alt="{{ $user->name }}">
      <input id="photo" name="photo" type="file" class="form-control-file">
    </div><!-- Avatar -->


    <div class="col-md-4">
     <p>{{ __('Password modification') }}</p>
      <!-- User current password  -->
      <div class="form-group">
        <label for="current_password">{{ __('Current Password') }}</label>
        <input id="current_password" name="current_password" type="password" class="form-control">
      </div><!-- User current password  -->
      
      <!-- User password -->
      <div class="form-group">
        <label for="password">{{ __('Password') }}</label>
        <input id="password" name="password" type="password" class="form-control">
      </div><!-- User password -->
      
      <!-- User password confirmation -->
      <div class="form-group">
        <label for="password_confirmation">{{ __('Password confirmation') }}</label>
        <input id="password_confirmation" name="password_confirmation" type="password" class="form-control">
      </div><!-- User password confirmation -->
    </div>

  </div>
  <!--Form inputs upper row -->

</form>


@endsection
