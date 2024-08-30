<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Kantin SMEA')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

  @stack('styles')
</head>
<body>

  @if (!in_array(Route::currentRouteName(), ['login', 'register']))
    @include('components.navbar') <!-- Only include navbar if not on login or register page -->
  @endif

  <main class="py-4">
    @yield('content')
  </main>

  <!-- Logout form (hidden) -->
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
  </form>

  <!-- Include Bootstrap JS and any additional scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  @stack('scripts')

  <script>
      // Add logout functionality when clicking the logout link
      function handleLogout(event) {
          event.preventDefault();
          document.getElementById('logout-form').submit();
      }
  </script>
</body>
</html>
