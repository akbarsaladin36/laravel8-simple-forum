@if (Auth::check() && Auth::user()->roles === "admin")
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Forum-Admin</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#">All Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">All Posts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">All Comments</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.logout') }}">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
@elseif (Auth::check() && Auth::user()->roles === "user") 
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{ route('user.home') }}">Forum</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#">Messages</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('user.show.profile', ['username'=>Auth::user()->username]) }}">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('user.logout') }}">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
@else
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="{{ route('welcome') }}">Forum</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('auth.login') }}">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('auth.register') }}">Register</a>
            </li>
          </ul>
        </div>
      </div>
  </nav>
@endif

