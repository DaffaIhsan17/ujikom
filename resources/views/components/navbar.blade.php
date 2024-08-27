<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('dashboard') }}">
      <img src="{{ asset('img/logo.png') }}" alt="Kantin SMEA">
      <span>Kantin SMEA</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('dashboard') }}">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('kantin1') }}">Kantin Aquarium</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('kantin2') }}">Kantin Belakang</a>
        </li>
      </ul>
      <div class="dropdown">
        <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="{{ asset('img/profile.png') }}" class="icon" alt="Profil">
        </button>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
          <li><a class="dropdown-item" href="{{ route('keranjang') }}">Keranjang</a></li>
          <li>
            <a href="#" onclick="handleLogout(event)" class="dropdown-item text-danger">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
