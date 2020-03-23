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
    protected function Checklogin() {
        $sql = "SELECT * FROM users WHERE email = ? AND pw = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam('s', $this->email);
        $stmt->bindParam('s', $this->password);
        $stmt->execute([$this->email, $this->password]);
        $stmt->rowCount();
        
        return $stmt;
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
}