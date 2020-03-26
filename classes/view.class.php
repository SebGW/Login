<?php
class UserView extends User{

    // Login.php
    public function showLoginResult($email, $password) {
        $this->checkLogin($email, $password);
    }











    // Index.php
    // Få fat i brugerens profile billedet
    public function showUserImg($userID) {
        $this->getUserImg($userID);
    }


    // public function showUserInfo($id) {
    //     $this->getUserInfo($id);
    // }


    public function showUsers() {
        $this->getUsers();
    }







    
    // Hash.php
    public function ShowSetUser() {
        $this->setUser();
    }
    



    // Profile.php
    // public function showSetProfileImg() {
    //     $this->setProfileImg();
    // }


    // upload-img.php
    public function setUploadProfileImg($imageName, $userID) {
        $this->uploadProfileImg($imageName, $userID);
    }

}