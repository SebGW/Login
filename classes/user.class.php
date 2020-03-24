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



        // $hashedPW = password_hash($this->password, PASSWORD_DEFAULT);


        $sql = "SELECT * FROM users WHERE email = ? AND pw = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam('s', $this->email);
        $stmt->bindParam('s', $this->password);
        $stmt->execute([$this->email, $this->password]);





        // Check hash password match
        // Kommer tilbage til dette punkt senere!
        // Jeg vil gerne have at password_hash algo skal være på PASSWORD_DEFAULT
        // ps: Er lidt i tvivl om password_verify returner som True / False eller som nummer?
        // Besvar gerne dette!

        while ($row = $stmt->fetch()) {
            // $userID = $row['id'];
            $id = $row['id'];
            $pw = $row['pw'];
            // $username = $row['firstname'];
        }


        // DETTE ER INPUT FRA BRUGER
        // $this->password

        // DETTE ER PASSWORD I DATABASEN
        // echo $pw;

        $hashedPW = password_hash($this->password, PASSWORD_DEFAULT);
        echo password_verify($pw, $hashedPW);

        // DOG ER JEG I TVIVL OM HVORDAN DEN RETURNER?

        exit();





        // Check if user exist
        $checkUser = new User($this->email, $this->password);
        $checkUser->checkUser($stmt, $id);

        return $stmt;
    }
    
    protected function checkUser($stmt, $id) {
        // $stmt->rowCount();
        if (!$stmt->rowCount() == 1) {
            echo 'Eksisterer ikke!';
            exit();
        }
        else if ($stmt->rowCount() == 1){
            echo 'Eksisterer!';
            echo '<br>';
            // session_start();
            $_SESSION['id'] = $id;
            header("Location: index.php?id=" . $id);
        }
        else {
            echo 'Der opstod en fejl!';
            exit();
        }

    }
    






    
    
    // Index.php
    protected function getUsers() {
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
        $hashPW = password_hash("sebseb", PASSWORD_DEFAULT);

        $sql = "INSERT INTO `users`(`firstname`, `lastname`, `email`, `pw`) VALUES ('Seb2', '22', 'noget@gmail.com', '$hashPW')";
        $stmt = $this->connect()->query($sql);
        return $stmt;
        // $stmt->bindParam('s', );
    }






}