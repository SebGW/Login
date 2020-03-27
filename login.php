<?php
include 'classes/dbh.class.php';
include 'classes/user.class.php';
include 'classes/view.class.php';
include 'includes/header.php';
?>

<div class="container-md d-flex justify-content-center align-items-center form-height">
<form action="login-script.php" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">E-mail addresse</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Adgangskode</label>
    <input type="password" name="pw" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <a href="register.php">Registrer dig her</a>
  </div>
  <button type="submit" name="login-submit" class="btn btn-outline-success">Login</button>
</form>
</div>
<?php
include 'includes/footer.php';
?>