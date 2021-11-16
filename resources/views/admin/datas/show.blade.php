@extends('layouts.admin')

@section('admin-content')

  <x-admin.header.show-component name="{{ __('Data') }}" plural-name="{{ __('Datas') }}" :title="$data->name" :index-link="route('admin.datas.index')" :create-link="route('admin.datas.create')" />



  <!-- Row display Datas -->
  <div class="row">
    <div class="col-md-12">
      <pre id="displayDatas" class="vh-100 rounded">
        {!! $content !!}
      </pre>
    </div>

    <!-- Undisplayed <textarea>, will be filled with the content of the correponding <div>  -->
    <textarea id="textareaDatas" class="textInput" name="js" hidden disabled>{!! $content !!}</textarea>

  </div><!-- Row display Datas -->



<script>
window.onload = function () {
  editorToTextarea('displayDatas', 'textareaDatas', 'json');
}
</script>


@endsection
