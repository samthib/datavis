@extends('layouts.master')

@section('content')

  <!-- Email -->
  <div class="bg-dark d-md-flex flex-md-equal text-white min-vh-100">
    <!-- Email part -->
    <div class="py-1 pt-md-3 pb-md-5 text-center">
      <h2 class="display-5 my-md-5 py-3">Contactez moi</h2>
      <div class="mx-auto col-11 col-md-8 col-lg-6">

          @if (session()->has('message'))
            <div class="alert alert-info" role="alert">
              {{ session()->get('message') }}
            </div>
          @endif

          <form id="contactForm" action="{{ route('messages.store') }}" method="POST">
            @csrf

            <div class="row">
              <fieldset class="form-group col-6">
                <label for="name"><b>Nom</b></label>
                <input id="name" type="text" name="name" class="form-control @error ('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="John Doe">
                  @error('name')
                    <div class="">{{ $message }}</div>
                  @enderror
                </fieldset>
                <fieldset class="form-group col-6">
                  <label for="email"><b>Email</b></label>
                  <input id="email" type="email" name="email" class="form-control @error ('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="johndoe@email.com">
                    @error('email')
                      <div class="">{{ $message }}</div>
                    @enderror
                  </fieldset>
                  <fieldset class="form-group col-12">
                    <label for="subject"><b>Sujet</b></label>
                    <input id="subject" type="text" name="subject" class="form-control @error ('subject') is-invalid @enderror" value="{{ old('subject') }}" placeholder="Sujet ...">
                      @error('subject')
                        <div class="">{{ $message }}</div>
                      @enderror
                    </fieldset>
                    <fieldset class="form-group col-12">
                      <label for="message"><b>Message</b></label>
                      <textarea id="message" name="message" class="form-control @error ('message') is-invalid @enderror" rows="8" placeholder="Votre message ...">{{ old('message') }}</textarea>
                        @error('message')
                          <div class="">{{ $message }}</div>
                        @enderror
                      </fieldset>
                    </div>
                    <button type="submit" class="btn btn-outline-light btn-lg my-1 my-md-3 my-lg-5">Envoyer</button>
                  </form>

              </div>
            </div><!-- Email part -->
          </div><!-- Email -->

        @endsection
