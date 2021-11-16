@extends('layouts.admin')

@section('admin-content')

  <x-admin.header.show-component name="{{ __('Libraries') }}" plural-name="{{ __('Librariess') }}" :title="$library->name.' - '.$library->version" :index-link="route('admin.libraries.index')" :create-link="route('admin.libraries.create')" />



  <!-- Row display Libraries -->
  <div class="row">
    <div class="col-md-12">
      <pre id="displayLibraries" class="editors rounded">
        {!! $content !!}
      </pre>
    </div>

    <!-- Undisplayed <textarea>, will be filled with the content of the correponding <div>  -->
    <textarea id="textareaLibraries" class="textInput" name="js" hidden disabled>{!! $content !!}</textarea>

  </div><!-- Row display Libraries -->



<script>
window.onload = function () {
  editorToTextarea('displayLibraries', 'textareaLibraries', 'javascript');
}
</script>

@endsection
