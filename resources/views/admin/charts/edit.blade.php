@extends('layouts.admin')

@section('admin-content')

  <x-admin.header.edit-component name="{{ __('Chart') }}" plural-name="{{ __('Charts') }}" :title="$chart->title" :index-link="route('admin.charts.index')" :create-link="route('admin.charts.create')" />


    <!-- Responsive Iframe container -->
    <div class="row d-flex justify-content-center">
      <div class="col-md-8">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item iframe-chart" style="border-radius: 21px;" src="{{ route('charts.shadow', $chart) }}" allowfullscreen scrolling="no"></iframe>
        </div>
      </div>
    </div><!-- Responsive Iframe container -->


    <form id="form" action="{{ route('admin.charts.update', $chart) }}" method="post">
      @csrf
      @method('PUT')

      <!--Form inputs upper row -->
      <div class="row">

        <!-- Graphic name -->
        <div class="form-group col-md-4">
          <label for="title">Title</label>
          <input id="title" name="title" type="text" class="form-control" value="{{ $chart->title }}" required>
        </div><!-- Graphic name -->

        <!-- Graphic version name -->
        <div class="form-group col-md-4">
          <label for="subtitle">Subtitle</label>
          <input id="subtitle" name="subtitle" type="text" class="form-control" value="{{ $chart->subtitle }}" required>
        </div><!-- Graphic version name -->

        <!-- Checkbox Available-->
        <div class="form-group col-md-2 d-flex align-items-end">
          <label for="available">
            <span>Availabity</span>
            <input id="available" name="available" type="checkbox" {{ ($chart->available == 1) ? 'checked' : '' }} />
          </label>
        </div><!-- Checkbox Available-->

        <!-- Form buttons -->
        <div class="form-group col-md-2 d-flex align-items-end justify-content-end">
          <!-- Action buttons -->
          <button type="submit" form="form" class="btn btn-primary mr-1">Save</button>
          <a href="{{ route('admin.charts.index') }}" class="btn btn-danger">Cancel</a>
        </div><!-- Form buttons -->

        <!-- Description -->
        <div class="form-group col-md-8">
          <label for="description">Description</label>
          <textarea id="description" class="form-control" name="description" value="" rows="5">{{ $chart->description }}</textarea>
        </div><!-- Description -->

        <!-- Library select -->
        <div class="form-group col-md-4">
          <label for="libraries">Libraries</label>
          <select id="libraries" name="libraries[]" class="custom-select" size="5" multiple>
            @foreach ($libraries as $key => $library)
              <option value="{{ $library->id }}" {{ ($chart->libraries->pluck('id')->contains($library->id)) ? 'selected' : '' }}>{{ $library->name." - ".$library->type }}</option>
            @endforeach
          </select>
        </div><!-- Library select -->

        <!-- Data select -->
        <div class="form-group col-md-4">
          <label for="datas[]">Datas</label>
          <select id="datas[]" name="datas[]" class="custom-select" size="5" multiple onchange="toggleLinks(this, 'data-link', 'links-container')">
            @foreach ($datas as $key => $data)
              <option value="{{ $data->id }}" data-link="{{ url('storage/'.$data->file) }}" {{ ($chart->datas->pluck('id')->contains($data->id)) ? 'selected' : '' }}>{{ $data->name." - ".$data->type }}</option>
            @endforeach
          </select>

          <!-- Links to file -->
          <div id="links-container">                    
            @foreach ($chart->datas as $data)
            <div class="alert alert-primary mt-2 mb-0 text-break" role="alert">
              <a id="data-link" href="{{ asset('storage/'.$data->file) }}" class="alert-link text-break" target="blank">{{
                asset('storage/'.$data->file) }}</a>
            </div>
            @endforeach
          </div><!-- Links to file -->
        </div><!-- Data select -->

        <!-- File select -->
        <div class="form-group col-md-4">
          <label for="files[]">Files</label>
          <select id="files[]" name="files[]" class="custom-select" size="5" multiple onchange="toggleLinks(this, 'data-file', 'files-container')">
            @foreach ($files as $key => $file)
            <option value="{{ $file->id }}" data-file="{{ url('storage/'.$file->file) }}" {{ ($chart->files->pluck('id')->contains($file->id)) ? 'selected' : '' }}>{{
              $file->name." - ".$file->type }}</option>
            @endforeach
          </select>
        
          <!-- Links to file -->
          <div id="files-container">
            @foreach ($chart->files as $file)
            <div class="alert alert-primary mt-2 mb-0 text-break" role="alert">
              <a id="file-link" href="{{ asset('storage/'.$file->file) }}" class="alert-link text-break" target="blank">{{
                asset('storage/'.$file->file) }}</a>
            </div>
            @endforeach
          </div><!-- Links to file -->
        </div><!-- File select -->

        <!-- Media select -->
        <div class="form-group col-md-4">
          <label for="medias[]">Medias</label>
          <select id="medias[]" name="medias[]" class="custom-select" size="5" multiple onchange="toggleLinks(this, 'data-media', 'medias-container')">
            @foreach ($medias as $key => $media)
            <option value="{{ $media->id }}" data-media="{{ url('storage/'.$media->file) }}" {{ ($chart->medias->pluck('id')->contains($media->id)) ? 'selected' : '' }}>{{
              $media->name." - ".$media->type }}</option>
            @endforeach
          </select>
        
          <!-- Link to file -->
          <div id="medias-container">
            @foreach ($chart->medias as $media)
            <div class="alert alert-primary mt-2 mb-0 text-break" role="alert">
              <a id="media-link" href="{{ asset('storage/'.$media->file) }}" class="alert-link text-break" target="blank">{{
                asset('storage/'.$media->file) }}</a>
            </div>
            @endforeach
          </div><!-- Link to file -->
        </div><!-- Media select -->

      </div><!--Form inputs upper row -->


      <!-- Row editor -->
      <div class="row editor" id="charts-editor">

        <!-- JS Editor -->
        <div class="form-group col-md-6">
          <P>Javascript</P>
          <pre id="modifyCodeJS" class="vh-100 rounded">{{ $chart->js ?? '// Write your code ...' }}</pre>
          <textarea id="textareaJS" class="textInput" name="js" hidden>{{ $chart->js }}</textarea>
        </div><!-- JS Editor -->

        <!-- CSS Editor -->
        <div class="form-group col-md-6">
          <P>CSS</P>
          <pre id="modifyCodeCSS" class="vh-100 rounded">{{ $chart->css ?? "/* Write your code ... */" }}</pre>
          <textarea id="textareaCSS" class="textInput" name="css" hidden>{{ $chart->css }}</textarea>
        </div><!-- CSS Editor -->

      </div><!-- Row editor -->

    </form>

    @include('admin.charts.partials.scripts')

  @endsection
