<?php
session_start();
include '../classes/dbh.class.php';
include '../classes/user.class.php';
include '../classes/view.class.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {


$setdeleteProfileImg = new UserView();
$setdeleteProfileImg->setdeleteProfileImg($_SESSION['CurrentUser']['id']);


header("Location: profile.php?img=deleted");


}else {
    header("Location: profile.php?access=none");
}