<?php
include 'includes/header.php';
include 'classes/dbh.class.php';
include 'classes/user.class.php';
include 'classes/view.class.php';

if (isset($_SESSION['CurrentUser']['id'])) {

    // echo $_SESSION['CurrentUser']['id'];
    // echo $_SESSION['CurrentUser']['firstname'] . ' ' . $_SESSION['CurrentUser']['lastname'];

}
else {
    header("Location: login.php?login=none");
    exit();
}
?>


<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <a href="profile/profile.php" class="navbar-brand">
<?php
$showUserImg = new UserView();
$showUserImg->showUserImg($_SESSION['CurrentUser']['id']);
?>
</a>
<button class="navbar-toggler" data-toggle="collapse" data-target="#navbar-menu">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse justify-content-end" id="navbar-menu">
  <ul class="navbar-nav text-center">

  <li class="nav-item">
    <a href="profile/profile.php" class="nav-link">Profil</a>
  </li>

  <li class="nav-item">
  <a href="logout.php" class="nav-link">Log ud</a>
  </li>

</ul>
</div>
</nav>


<div class="container">


<!-- <button style="width: 100%; background-color: #fff; border: 1px solid black; color: blue;">+</button> -->

<form action="#" method="POST">
<input type="text" name="addDir">
<input type="submit" name="addDir-submit">
</form>

<br>


<div class="row folder-height">

    <div class="col-6 col-md-4 d-flex justify-content-center align-items-center">
      <!-- <img src="img/crash.png" alt="" height="50" width="50"> -->
      <svg class="bi bi-archive-fill" width="40" height="40" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM6 7a.5.5 0 000 1h4a.5.5 0 000-1H6zM.8 1a.8.8 0 00-.8.8V3a.8.8 0 00.8.8h14.4A.8.8 0 0016 3V1.8a.8.8 0 00-.8-.8H.8z" clip-rule="evenodd"/>
</svg>
    </div>
    <div class="col-6 col-md-4">.col-6 .col-md-4</div>
    <div class="col-6 col-md-4">.col-6 .col-md-4</div>
    <div class="col-6 col-md-4">.col-6 .col-md-4</div>
    <div class="col-6 col-md-4">.col-6 .col-md-4</div>
    <div class="col-6 col-md-4">.col-6 .col-md-4</div>
    <div class="col-6 col-md-4">.col-6 .col-md-4</div>
    <div class="col-6 col-md-4">.col-6 .col-md-4</div>
    <div class="col-6 col-md-4">.col-6 .col-md-4</div>
    <div class="col-6 col-md-4">.col-6 .col-md-4</div>
    <div class="col-6 col-md-4">.col-6 .col-md-4</div>
    <div class="col-6 col-md-4">.col-6 .col-md-4</div>
  </div>
</div>

<?php
// $showUsers = new UserView();
// $showUsers->showUsers();

?>

</div>


<?php
include 'includes/footer.php';
?>