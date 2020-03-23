<?php
// session_start();
include 'includes/header.php';

if (isset($_SESSION['id'])) {
    echo $_SESSION['id'];
}
else {
    // echo "Not set!";
    header("Location: login.php?login=no");
}


include 'classes/dbh.class.php';
include 'classes/user.class.php';
include 'classes/view.class.php';

?>

<?php
// $showUsers = new UserView();
// $showUsers->showUsers();

// if (isset($_SESSION['id'])) {
//     echo $_SESSION['id'];
// }
// else {
//     echo "Not set!";
// }

// echo $_SESSION['id'];

?>


<a href="logout.php">Log ud!</a>

<?php
include 'includes/footer.php';
?>