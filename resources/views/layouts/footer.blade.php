<footer class="container-fluid pt-5 bg-dark">
  <div class="row">
    <div class="col-12 col-md">
      <img width="37" height="24" src="{{ asset('storage/'.$design->logo) }}" alt="Logo">
      <small class="d-block mb-3 text-muted">
        <a class="text-light" href="http://samuel-thibault.fr" target="_blank">Samuel Thibault</a>
        &copy; 2017-2020</small>
    </div>
    <div class="col-6 col-md">
      <h5 class="text-white">Fonctionnement</h5>
      <ul class="list-unstyled text-small">
        @foreach ($pages as $key => $page)
          <li><a class="text-muted" href="{!! route('pages.show', $page) !!}">{{ $page->title }}</a></li>
        @endforeach
      </ul>
    </div>
    <div class="col-6 col-md">
      <h5 class="text-white">Politique</h5>
      <ul class="list-unstyled text-small">
        <li><a class="text-muted" href="#">Termes</a></li>
        <li><a class="text-muted" href="#">CGU</a></li>
        <li><a class="text-muted" href="#">CGV</a></li>
      </ul>
    </div>
    <div class="col-6 col-md">
      <h5 class="text-white">A-propos</h5>
      <ul class="list-unstyled text-small">
        <li><a class="text-muted" href="#">Moi</a></li>
        <li><a class="text-muted" href="#">Emplacemnt</a></li>
        <li><a class="text-muted" href="{!! route('messages.create') !!}">Contact</a></li>
      </ul>
    </div>
  </div>
</footer>
