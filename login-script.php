<?php
session_start();
include 'classes/dbh.class.php';
include 'classes/user.class.php';
include 'classes/view.class.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $pw = $_POST['pw'];

    $validLogin = new UserView();
    $validLogin->showLoginResult($email, $pw);
} else {
    header("Location: login.php?access=none");
}
