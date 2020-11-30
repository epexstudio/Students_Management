<nav class="navbar navbar-dark bg-success">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="assets\logo.png" alt="" width="30" height="24" class="d-inline-block align-top">
      Student Management System
    </a>
    <?php if(!User::loggedIn()) {?> 
    <form class="d-flex" action="login.php">
      <button class="btn btn-outline-light" type="submit">Login</button>
    </form>
    <?php } else {
                ?> 
                <form action="logout.php">
                  <button class="btn btn-outline-light" type="submit">Logout</button>
                </form>
                <?php 
               } ?>
  </div>
</nav>