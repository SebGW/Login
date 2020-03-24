<?php
include 'classes/dbh.class.php';
include 'classes/user.class.php';
include 'classes/view.class.php';
include 'includes/header.php';
?>


<div class="container">
<form action="login-script.php" method="POST">
<input type="text" name="email" placeholder="E-mail...">
<input type="text" name="pw" placeholder="Adgangskode...">
<input type="submit" name="login-submit" value="Send">
</form>
</div>




<?php
include 'includes/footer.php';
?>