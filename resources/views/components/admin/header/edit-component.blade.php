<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">{{ $pluralName }}</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
      <a class="btn btn-secondary" href="{{ $indexLink }}" role="button"><span data-feather="list"></span> {{ $pluralName }} {{ __('list') }}</a>
    </div>
    <div class="btn-group mr-2">
      <a class="btn btn-success" href="{{ $createLink }}" role="button"><span data-feather="plus-circle"></span> {{ __('New') }} {{ $name }}</a>
    </div>
  </div>
</div>

<h3 class="text-center">{{ $title }}</h3>
