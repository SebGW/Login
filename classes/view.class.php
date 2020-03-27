<?php
class UserView extends User{


    // Register.php
    public function setUserSignUp($firstname, $lastname, $email, $password) {
        $this->userSignUp($firstname, $lastname, $email, $password);
    }





    // Login.php
    public function showLoginResult($email, $password) {
        $this->checkLogin($email, $password);
    }











    // Index.php
    // Få fat i brugerens profile billedet
    public function showUserImg($userID) {
        $this->getUserImg($userID);
    }


    public function showUsers() {
        $this->getUsers();
    }







    



    // upload-img.php
    public function setUploadProfileImg($imageName, $userID) {
        $this->uploadProfileImg($imageName, $userID);
    }

    // Delete-img.php
    public function setdeleteProfileImg($userID) {
        $this->deleteProfileImg($userID);
    }
}