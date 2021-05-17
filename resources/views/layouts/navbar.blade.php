<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Simple perpustakaan</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item {{ request()->is('/') ? 'active' : ''}}">
          <a class="nav-link " href="/">Home </a>
        </li>
        <li class="nav-item {{ request()->is('login') ? 'active' : ''}}">
          <a class="nav-link" href="/login">login</a>
        </li>
        <li class="nav-item {{ request()->is('contact') ? 'active' : ''}}">
          <a class="nav-link" href="/contact">Contact</a>
        </li>
        <li class="nav-item {{ request()->is('post') ? 'active' : ''}}">
          <a class="nav-link" href="/post">Daftar Buku</a>
        </li>

      </ul>
    </div>
  </nav>
