<nav class="navbar  navbar-expand-lg bg-white border-bottom shadow-sm" data-bs-theme="light">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#">Cours</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?= $currentPage === 'users' ? 'active' : '' ?>"  href="usersList.php">Utilisateurs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $currentPage === 'cards' ? 'active' : '' ?>" href="cardsList.php">Cartes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $currentPage === 'boards' ? 'active' : '' ?>" href="boardsList.php">Plateaux</a>
        </li>
      </ul>
      <form class="d-flex" role="search" method="post" action="search.php">
        <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search">
        <select class="form-select me-2" aria-label="Default select example" name="filter">
          <option selected value="all">Tous</option>
          <option value="user" >Utilisateurs</option>
          <option value="card">Cartes</option>
          <option value="board">Plateaux</option>
        </select>
        <button class="btn btn-outline-primary" type="submit">Rechercher</button>
      </form>
    </div>
  </div>
</nav>
