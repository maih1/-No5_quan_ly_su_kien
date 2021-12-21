<?php
// code kết nối CSDL = PDO
class Config{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "no5";


    public  function connect(){
        try {
            $conn = 'mysql:host=' . $this->servername . ';dbname=' . $this->dbname; 'charset=utf8';
            $pdo = new PDO($conn,$this->username,$this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e){
            echo "Connect failed" .$e->getMessage();
        }
    }

}
?>