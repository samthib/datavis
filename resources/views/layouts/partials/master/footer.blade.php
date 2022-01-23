<footer class="container-fluid pt-2 pt-md-5 bg-dark">
  <div class="row">
    <div class="col-12 col-md">
      <img width="37" height="24" src="{{ asset('storage/'.($design->logo ?? '')) }}" alt="Logo">
      <small class="d-block text-muted">
        <a class="text-light" href="http://samuel-thibault.fr" target="_blank"><b class="text-white">Samuel Thibault</b></a>
        &copy; 2017-2020
      </small>
      <ul class="d-flex flex-row justify-content-start my-2">
        <li class="px-1">
          <a href="https://www.linkedin.com/in/samuel-thibault-1528481b1/" target="_blank">
            <i class="text-white fa fa-linkedin fa-lg" aria-hidden="true"></i>
          </a>
        </li>
        <li class="px-1">
          <a href="https://github.com/samthib" target="_blank">
            <i class="text-white fa fa-github fa-lg" aria-hidden="true"></i>
          </a>
        </li>
        <li class="px-1">
          <a href="https://join.skype.com/invite/orqkc7QFyMAE" target="_blank">
            <i class="text-white fa fa-skype fa-lg" aria-hidden="true"></i>
          </a>
        </li>
        <li class="px-1">
          <a href="https://wa.me/212669056659" target="_blank">
            <i class="text-white fa fa-whatsapp fa-lg" aria-hidden="true"></i>
          </a>
        </li>
      </ul>
    </div>
    <div class="col-6 col-md">
      <h5 class="text-white">Fonctionnement</h5>
      <ul class="list-unstyled text-small">
        @foreach ($footerPages as $key => $page)
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
