<div class="container">
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('home.*') ? 'active' : '' }}" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('mahasiswa.*') ? 'active' : '' }}"
              href="{{ route('mahasiswa.index') }}">Mahasiswa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('book.*') ? 'active' : '' }}" href="/book">Book</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>
