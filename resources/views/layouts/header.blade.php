 <!-- Page Heading -->
 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container-fluid">
      <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#navbarExample01"
        aria-controls="navbarExample01"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarExample01">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/" class="">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('photos/*') ? 'active' : '' }}" href="/photos">Photos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('users/*') ? 'active' : '' }}" href="/users">Users</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar -->

  <!-- Jumbotron -->
  <div class="p-5 text-center bg-light">
    <h1 class="mb-3">Heading</h1>
    <h4 class="mb-3">Subheading</h4>
    <a class="btn btn-primary" href="" role="button">Call to action</a>
  </div>
  <!-- Jumbotron -->

