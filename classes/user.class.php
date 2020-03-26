<?php
class User extends Dbh {

    private $email;
    private $password;

    // Constructer
    // public function __construct($email, $password) {
    //     $this->email = $email;
    //     $this->password = $password;
    // }

    
    //Login.php
    protected function checkLogin($email, $password) {
        $this->email = $email;
        $this->password = $password;


        if(empty($this->email)) {
            echo 'Mangler E-mail adresse!';
            exit();
        }
        else if (empty($this->password)) {
            echo 'Mangler Adgangskode!';
            exit();
        }
        else if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            echo 'Dette er ikke en E-mail adresse!';
            exit();
        }

          //Query sql til at finde den bruger med email og hashed password.
          $sql = "SELECT * FROM users WHERE email = :email";
          $stmt = $this->connect()->prepare($sql);
          $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
          $stmt->execute();
          $pw = "";
          $id = 0;
          while ($row = $stmt->fetch()) {
              $id = $row['id'];
              $firstname = $row['firstname'];
              $lastname = $row['lastname'];
              $email = $row['email'];
              $pw = $row['pw'];
          }
          $verify = password_verify($this->password,$pw);
        //   echo $verify;
          if(!$verify) {
              echo 'Forkert login!';
              exit();
          }

        //   $_SESSION['CurrentUser'] = (object) [
        //     'id' => $id,
        //     'firstname' => $username,
        //     'lastname' => $lastname,
        //     'email' => $email,
        //     'pw' => $pw

        //   ];
        $sessionArray = array(
            'id' => $id,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'pw' => $pw
        );
        $_SESSION['CurrentUser'] = $sessionArray;


        //   $_SESSION['id'] = $id;
        //   $_SESSION['firstname'] = $username;
        //   $_SESSION['lastname'] = $lastname;
        //   $_SESSION['email'] = $email;
        //   $_SESSION['password'] = $pw;
          header("Location: index.php");
      }



        



















    // protected function checkUser($stmt, $id) {
    //     // $stmt->rowCount();
    //     if (!$stmt->rowCount() == 1) {
    //         echo 'Eksisterer ikke!';
    //         exit();
    //     }
    //     else if ($stmt->rowCount() == 1){
    //         echo 'Eksisterer!';
    //         echo '<br>';
    //         // session_start();
    //         $_SESSION['id'] = $id;
    //         header("Location: index.php?id=" . $id);
    //     }
    //     else {
    //         echo 'Der opstod en fejl!';
    //         exit();
    //     }

    // }
    






    
    
    // Index.php
    // protected function getUserInfo($id) {
    //     // $sql = "SELECT * FROM users WHERE id = :id";
    //     $sql = "SELECT * FROM users WHERE id = '$id'";
    //     $stmt = $this->connect()->query($sql);
    //     return $stmt;
    // }
    
    
    
    
    // Index.php
    protected function getUsers() {

        // Få fat i alle brugere
        $sql = "SELECT * FROM users";
        $stmt = $this->connect()->query($sql);
        while ($row = $stmt->fetch()) {
            // echo $row['firstname'] . '<br>';
            // print_r($row);
            echo 'Navn: ' . ucfirst($row['firstname']) . ' ' . ucfirst($row['lastname']) . '<br>';
        }
        return $stmt;
    }



    // Få fat i brugerens profile billedet
    protected function getUserImg($userID) {
        $sql = "SELECT * FROM profile_img WHERE user_id = $userID";
        $stmt = $this->connect()->query($sql);

        if (!$stmt->rowCount() == 1) {
            echo '<img src="profile/uploads/user-pic.png" alt="" class="img-thumbnail profile-img">';
        }

        while ($row = $stmt->fetch()) {
            $srcName = $row['name'];
            echo '<img src="profile/' . $srcName . '" alt="' . $srcName . '" class="img-thumbnail profile-img">';
        }




    }












    // Hash.php
    protected function setUser() {
        $hashPW = password_hash("johndoe123", PASSWORD_DEFAULT);

        $sql = "INSERT INTO `users`(`firstname`, `lastname`, `email`, `pw`) VALUES ('John', 'Doe', 'johndoe@gmail.com', '$hashPW')";
        $stmt = $this->connect()->query($sql);
        return $stmt;
    }



    // Profile.php
    // protected function setProfileImg() {
    //     $sql = "INSERT INTO profile_img (`name`, `user_id`, `location`) VALUES ('crash.php', '7', 'img/')";
    //     $stmt = $this->connect()->query($sql);
    //     return $stmt;
    // }





    // upload-img.php
    protected function uploadProfileImg($imageName, $userID) {
        $sql = "INSERT INTO profile_img (name, user_id, location) VALUES (:name, :user_id, 'uploads/')";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':name', $imageName);
        $stmt->bindParam(':user_id', $userID);
        $stmt->execute();
    }




}