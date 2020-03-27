<?php
include 'classes/dbh.class.php';
include 'classes/user.class.php';
include 'classes/view.class.php';
include 'includes/header.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$pw = $_POST['pw'];

$setUserSignUp = new UserView();
$setUserSignUp->setUserSignUp($firstname, $lastname, $email, $pw);





}else {
    header("Location: register.php?access=none");
}