<?php
include 'classes/dbh.class.php';
include 'classes/user.class.php';
include 'classes/view.class.php';
include 'includes/header.php';

if (isset($_POST['login-submit'])) {
   $email = $_POST['email'];
   $pw = $_POST['pw'];
   
   $validLogin = new UserView($email, $pw);
   $validLogin->showResults();
}

?>


<form method="POST">
<input type="text" name="email" placeholder="E-mail...">
<input type="text" name="pw" placeholder="Adgangskode...">
<input type="submit" name="login-submit" value="Send">
</form>




<?php
include 'includes/footer.php';
?>