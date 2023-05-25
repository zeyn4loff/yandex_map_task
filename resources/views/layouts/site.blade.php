<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Yandex Map Task</title>
  @include('layouts.inc.site.styles')
</head>
<body>
<div class="header-main px-3 px-lg-4 d-flex flex-wrap justify-content-center">
  <a href="{{ route('home.get') }}"
     class="header-logo d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
    Yandex Map Task
  </a>
  @auth
    <a href="{{ route('logout.get') }}" class="btn btn-outline-primary me-2">Logout</a>
  @endauth
  @guest
    <a href="{{ route('login.get') }}" class="btn btn-outline-primary me-2">Sign in</a>
    <a href="{{ route('register.get') }}" class="btn btn-outline-primary">Sign up</a>
  @endguest
</div>

</div>
<div class="main main-app">
  @yield('content')
</div>
@include('layouts.inc.site.scripts')
</body>
</html>
