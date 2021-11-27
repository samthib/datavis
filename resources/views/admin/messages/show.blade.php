@extends('layouts.admin')

@section('admin-content')

  <x-admin.header.show-component name="{{ __('Message') }}" plural-name="{{ __('Messages') }}" :title="$message->name.' - '.$message->email" :index-link="route('admin.messages.inbox.index')" :create-link="route('admin.messages.create')" />

    {!! $email !!}

@endsection
