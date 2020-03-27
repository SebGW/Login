<?php 
include '../includes/header.php';
include '../classes/dbh.class.php';
include '../classes/user.class.php';
include '../classes/view.class.php';


?>
<link rel="stylesheet" href="../styles/style.css">

<?php
$showUserImg = new UserView();
$showUserImg->showUserImg($_SESSION['CurrentUser']['id']);
?>




<form action="upload-img.php" method="POST" enctype="multipart/form-data">
<input type="file" name="fileToUpload">
<input type="submit" name="submit" value="Upload fil">
</form>

<br>


<form action="delete-img.php" method="POST">
<input type="submit" name="deleteFile" value="Slet">
</form>

<br>

<a href="../index.php">Tilbage</a>


<?php
include '../includes/footer.php';
?>