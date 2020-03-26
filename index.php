<?php
include 'includes/header.php';
include 'classes/dbh.class.php';
include 'classes/user.class.php';
include 'classes/view.class.php';

if (isset($_SESSION['CurrentUser']['id'])) {

    // $showUserInfo = new UserView($_SESSION['email'], $_SESSION['password']);
    // $showUserInfo->showUserInfo($_SESSION['id']);

    // echo $_SESSION['CurrentUser']['id'];
    // echo $_SESSION['CurrentUser']['firstname'] . ' ' . $_SESSION['CurrentUser']['lastname'];

}
else {
    header("Location: login.php?login=none");
    exit();
}
?>


<nav class="navbar navbar-light bg-light">
<?php
$showUserImg = new UserView();
$showUserImg->showUserImg($_SESSION['CurrentUser']['id']);
?>
<!-- <img src="icon/user-pic.png" alt="User" class="img-thumbnail profile-img"> -->

  <ul class="nav justify-content-end">
  <!-- <li class="nav-item">
    <a class="nav-link active" href="#">Active</a>
  </li> -->

  <li class="nav-item">
    <a class="nav-link" href="profile/profile.php">Profil</a>
  </li>
  <li class="nav-item">
  <a class="nav-link" href="logout.php">Log ud</a>
  </li>
</ul>
</nav>


<div class="container">

<!-- Something -->

<!-- <div class="custom-file">
  <input type="file" class="custom-file-input" id="customFile">
  <label class="custom-file-label" for="customFile">Choose file</label>
</div> -->

<!-- <div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm">Small</span>
  </div>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
</div> -->


<!-- <form actione="#" method="POST" enctype="multipart/form-data">
<input type="file" name="userfile[]" multiple>
<input type="submit" name="usefile-submit" value="Upload">
</form> -->



<?php
// $showUsers = new UserView();
// $showUsers->showUsers();

?>



</div>








<!-- <div class="container-sm">100% wide until small breakpoint</div>
<div class="container-md">100% wide until medium breakpoint</div> -->
<!-- <div class="container">
    Something
</div> -->
<!-- <div class="container-xl">100% wide until extra large breakpoint</div> -->




<!-- <p>Velkommen <?php //echo $_SESSION['CurrentUser']['firstname'] . ' ' . $_SESSION['CurrentUser']['lastname']; ?></p> -->
<!-- <img src="img/user-pic.png" alt="img"> -->




<?php
include 'includes/footer.php';
?>