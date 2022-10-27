<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a href="./homepage.php" class="navbar-brand">Home</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="./menu.php">Add Menu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./cart.php">Cart</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./history.php">History</a>
        </li>
      </ul>
    </div>
    <div class="d-flex">
      <h5 class="mt-2"><?= $_SESSION['username'] ?></h5>
      <a href="./../services/logout.php" class="btn btn-outline-danger">Logout</a>
    </div>
  </div>
</nav>