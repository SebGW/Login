<?php
class UserView extends User{

    // Login.php
    public function showResults() {
        $this->checkLogin();
    }


    // Hash.php
    public function ShowSetUser() {
        $this->setUser();
    }



    public function showUsers() {
    $this->getUsers();

    }

    
}