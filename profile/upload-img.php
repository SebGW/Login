<?php
session_start();
include '../classes/dbh.class.php';
include '../classes/user.class.php';
include '../classes/view.class.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $fileName = $_FILES['fileToUpload']['name'];
    $fileType = $_FILES['fileToUpload']['type'];
    $fileTmpName = $_FILES['fileToUpload']['tmp_name'];
    $fileError = $_FILES['fileToUpload']['error'];
    $fileSize = $_FILES['fileToUpload']['size'];

    $target_dir = "uploads/";
    $target_file = $target_dir . $fileName;

    $allowed = array('jpg', 'png', 'jpeg', 'gif');

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);

    if ($fileError == 4) {
        echo 'Der er ikke blevet valgt nogle fil';
    }
    else {
    if (in_array($ext, $allowed)) {
        if ($fileSize < 100000) {
            if (!file_exists($target_dir . $fileName)) {
                move_uploaded_file($fileTmpName, $target_file);
                $setUploadProfileImg = new UserView();
                $setUploadProfileImg->setUploadProfileImg($target_file, $_SESSION['CurrentUser']['id']);
                header("Location: profile.php?upload=success");


            } else {
                $target_file_new = $target_dir . time() . '-' . $fileName;
                move_uploaded_file($fileTmpName, $target_file_new);
                $setUploadProfileImg = new UserView();
                $setUploadProfileImg->setUploadProfileImg($target_file_new, $_SESSION['CurrentUser']['id']);
                header("Location: profile.php?upload=success");


            }
        } else {
            echo 'Filen er for stor';
        }
    } else {
        echo 'Denne fil format understøttes ikke';
    }
}
} else {
    header("Location: profile.php?access=none");
}