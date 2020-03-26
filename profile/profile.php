<?php 
include '../includes/header.php';
include '../classes/dbh.class.php';
include '../classes/user.class.php';
include '../classes/view.class.php';


?>


<?php
echo '<img src="../img/crash.png" alt="Bruger" height="50" width="50">';
?>




<form action="upload-img.php" method="POST" enctype="multipart/form-data">
<input type="file" name="fileToUpload">
<input type="submit" name="submit" value="Upload fil">
</form>




<br>

<a href="../index.php">Tilbage</a>

<?php
$setProfileImg = new UserView();
// $setProfileImg->showSetProfileImg();
?>



<?php
include '../includes/footer.php';
?>