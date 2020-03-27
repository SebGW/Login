<?php
class User extends Dbh {

    private $email;
    private $password;

    // Constructer
    // public function __construct($email, $password) {
    //     $this->email = $email;
    //     $this->password = $password;
    // }

        // register.php
        protected function userSignUp($firstname, $lastname, $email, $password) {
            if (empty($firstname)) {
                echo 'Mangler Fornavn';
            }
            else if (empty($lastname)) {
                echo 'Mangler efternavn';
            }
            else if (empty($email)) {
                echo 'Mangler E-mail adresse';
            }
            else if (empty($password)) {
                echo 'Mangler Adgangskode';
            }
            else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo 'Dette er ikke en E-mail adresse';
            }
            // else if (!preg_match()) {

            // }
            // Regular Expression
            // $pattern = "";
            // preg_match

            $hashPW = password_hash($password, PASSWORD_DEFAULT);
            

            $sql = "INSERT INTO users (firstname, lastname, email, pw) VALUES (:firstname, :lastname, :email, :pw)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':pw', $hashPW);
            $stmt->execute();

            header("Location login.php?user=created");
        }



    
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
          header("Location: index.php");
      }

    



    
    
    
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


    // Index.php
    // Få fat i brugerens profile billedet
    protected function getUserImg($userID) {
        $sql = "SELECT * FROM profile_img WHERE user_id = $userID";
        $stmt = $this->connect()->query($sql);

        if (!$stmt->rowCount() == 1) {
            // echo '<img src="profile/uploads/user-pic.png" alt="Mangler billedet" class="img-thumbnail profile-img">';
            echo '<img src="/login/profile/uploads/user-pic.png" alt="Mangler billedet" class="img-thumbnail profile-img">';
        }

        while ($row = $stmt->fetch()) {
            $srcName = $row['name'];
            // echo '<img src="profile/' . $srcName . '" alt="' . $srcName . '" class="img-thumbnail profile-img">';
            echo '<img src="/login/profile/' . $srcName . '" alt="' . $srcName . '" class="img-thumbnail profile-img">';
        }
    }


    // upload-img.php
    protected function uploadProfileImg($imageName, $userID) {
        $sql = "INSERT INTO profile_img (name, user_id, location) VALUES (:name, :user_id, 'uploads/')";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':name', $imageName);
        $stmt->bindParam(':user_id', $userID);
        $stmt->execute();
    }


    // Delete-img.php
    protected function deleteProfileImg($userID){
        $sql = "DELETE FROM profile_img WHERE user_id = :user_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':user_id', $userID);
        $stmt->execute();
    }



}