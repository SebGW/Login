<?php
include 'classes/dbh.class.php';
include 'classes/user.class.php';
include 'classes/view.class.php';

$insertUser = new UserView("softsebdk@gmail.com", "Sebseb123");
// $insertUser->ShowSetUser();


// $hashPW = password_hash("Sebseb123", PASSWORD_DEFAULT);
// echo $hashPW;