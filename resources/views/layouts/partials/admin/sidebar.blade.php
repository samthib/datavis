<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
  <div class="sidebar-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ (Str::contains(url()->current(), 'dashboard')) ? 'active' : '' }}" href="{!! route('admin.dashboards.index') !!}">
          <span data-feather="home"></span>
          Dashboard <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (Str::contains(url()->current(), 'charts')) ? 'active' : '' }}" href="{!! route('admin.charts.index') !!}">
          <span data-feather="bar-chart-2"></span>
          Charts
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (Str::contains(url()->current(), 'libraries')) ? 'active' : '' }}" href="{!! route('admin.libraries.index') !!}">
          <span data-feather="code"></span>
          Libraries
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (Str::contains(url()->current(), 'datas')) ? 'active' : '' }}" href="{!! route('admin.datas.index') !!}">
          <span data-feather="database"></span>
          Datas
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (Str::contains(url()->current(), 'users')) ? 'active' : '' }}" href="{!! route('admin.users.index') !!}">
          <span data-feather="users"></span>
          Users
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (Str::contains(url()->current(), 'designs')) ? 'active' : '' }}" href="{!! route('admin.designs.index') !!}">
          <span data-feather="layout"></span>
          Designs
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (Str::contains(url()->current(), 'pages')) ? 'active' : '' }}" href="{!! route('admin.pages.index') !!}">
          <span data-feather="sidebar"></span>
          Pages
        </a>
      </li>
      <li class="nav-item accordion" id="accordion-messages">
        <a class="nav-link {{ (Str::contains(url()->current(), 'messages')) ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#collapse-messages" aria-expanded="true" aria-controls="collapse-messages">
          <span data-feather="mail"></span>
          Messages
        </a>
        <ul id="collapse-messages" class="nav flex-column collapse ml-3 {{ (Str::contains(url()->current(), 'messages')) ? 'show' : '' }}" data-parent="#accordion-messages">
          <li class="nav-item">
            <a class="nav-link {{ (Str::contains(url()->current(), 'inbox')) ? 'active' : '' }}" href="{!! route('admin.messages.inbox.index') !!}">
              <span data-feather="inbox"></span>
              Inbox
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (Str::contains(url()->current(), 'sent')) ? 'active' : '' }}" href="{!! route('admin.messages.sent.index') !!}">
              <span data-feather="send"></span>
              Sent
            </a>
          </li>
        </ul>
      </li>
    </ul>

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>Saved reports</span>
      <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
        <span data-feather="plus-circle"></span>
      </a>
    </h6>
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="file-text"></span>
          Current month
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="file-text"></span>
          Last quarter
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="file-text"></span>
          Social engagement
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="file-text"></span>
          Year-end sale
        </a>
      </li>
    </ul>
  </div>
</nav>
