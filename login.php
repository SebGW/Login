<?php
include 'classes/dbh.class.php';
include 'classes/user.class.php';
include 'classes/view.class.php';
include 'includes/header.php';
?>


<!-- <div class="login-container">
<form action="login-script.php" method="POST">
<input type="text" name="email" placeholder="E-mail...">
<input type="text" name="pw" placeholder="Adgangskode...">
<input type="submit" name="login-submit" value="Send">
</form>
</div> -->

<div class="login-container2">
<form action="login-script.php" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">E-mail addresse</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Adgangskode</label>
    <input type="password" name="pw" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" name="login-submit" class="btn btn-primary">Login</button>
</form>




<!-- <form>
  <div class="form-row align-items-center" style="justify-content: center; height: 100vh; width: 100%;">
    <div class="col-auto">
      <label class="sr-only" for="inlineFormInput">Name</label>
      <input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Jane Doe">
    </div>
    <div class="col-auto">
      <label class="sr-only" for="inlineFormInputGroup">Username</label>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">@</div>
        </div>
        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Username">
      </div>
    </div>
    <div class="col-auto">
      <button type="submit" class="btn btn-primary mb-2">Submit</button>
    </div>
  </div>
</form> -->






</div>
<?php
include 'includes/footer.php';
?>