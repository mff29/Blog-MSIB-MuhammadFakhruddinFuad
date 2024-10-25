<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container">
        <a class="navbar-brand" href="home"><b>FU'AD</b></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item">
              <a class="nav-link  {{ request()->is('home') ? 'active' : '' }}" aria-current="page" href="/home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->is('artikel') ? 'active' : '' }}" href="/artikel">Artikel</a>
            </li>
          @if (Auth::check())
            @if (Auth::user()->hasRole('admin'))
              <li class="nav-item">
                <a class="nav-link {{ request()->is('kategori') ? 'active' : '' }}" href="/kategori">Kategori</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('post') ? 'active' : '' }}" href="/post">Post</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('users') ? 'active' : '' }}" href="/users">Users</a>
              </li>
            @elseif (Auth::user()->hasRole('penulis'))
              <li class="nav-item">
                <a class="nav-link {{ request()->is('kategori') ? 'active' : '' }}" href="/kategori">Kategori</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('post') ? 'active' : '' }}" href="/post">Post</a>
              </li>
            @endif
          @endif
          </ul>

            <div class="profile">
              <ul class="navbar-nav">
                @if (Auth::user())
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}</a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="/profile">My Account</a></li>
                      <li><a class="dropdown-item" href="#">Settings</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li>
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                          @csrf
                          <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                      </li>
                    </ul>
                </li>
                @else
                <li class="nav-item"><a class="nav-link active" href="/login">Login</a></li>
                @endif
              </ul>
            </div>
        </div>
      </div>
</nav>
