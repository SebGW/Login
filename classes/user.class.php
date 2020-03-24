<?php
class User extends Dbh {

    private $email;
    private $password;

    // Constructer
    public function __construct($email, $password) {
        $this->email = $email;
        $this->password = $password;
    }

    
    //Login.php
    protected function checkLogin() {


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
              $pw = $row['pw'];
              // $username = $row['firstname'];
          }
          $verify = password_verify($this->password,$pw);
          echo $verify;
          if(!$verify) {
              echo 'Forkert login!';
              exit();
          }
          $_SESSION['id'] = $id;
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
    protected function getUsers() {
        




        // Få fat i alle brugere
        $sql = "SELECT * FROM users";
        $stmt = $this->connect()->query($sql);
        while ($row = $stmt->fetch()) {
            // echo $row['firstname'] . '<br>';
            print_r($row);
        }
        return $stmt;




    }












    // Hash.php
    protected function setUser() {
        $hashPW = password_hash("sebseb123", PASSWORD_DEFAULT);

        $sql = "INSERT INTO `users`(`firstname`, `lastname`, `email`, `pw`) VALUES ('Sebastian', 'Willemoes', 'softsebdk@gmail.com', '$hashPW')";
        $stmt = $this->connect()->query($sql);
        return $stmt;
        // $stmt->bindParam('s', );
    }






}