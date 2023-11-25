<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Home")? 'active' : '' }}" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Profil")? 'active' : '' }}" href="/profil">Profil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Artikel")? 'active' : '' }}" href="/post">Artikel</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Welcome")? 'active' : '' }}" href="/welcome">Welcome</a>
          </li>
        
        </ul>
      </div>
    </div>
  </nav>