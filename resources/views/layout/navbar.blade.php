<nav class="navbar navbar-expand-lg bg-body-tertiary">
     <div class="container-fluid">
          <a class="navbar-brand" href="#">FU'AD</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
               <ul class="navbar-nav">
                    <li class="nav-item {{ request()->is('home') ? 'active' : '' }}">
                         <a class="nav-link" aria-current="page" href="/home">Home</a>
                    </li>
                    <li class="nav-item {{ request()->is('kategori') ? 'active' : '' }}">
                         <a class="nav-link" href="/kategori">Kategori</a>
                    </li>
                    <li class="nav-item {{ request()->is('post') ? 'active' : '' }}">
                         <a class="nav-link" href="/post">Post</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li>
               </ul>
          </div>
     </div>
</nav>