<?php
    
class Connection {
    /* Localhost
    private $host = "localhost";
    private $database_name = "test";
    private $username = "root";
    private $password = "";
    */

    private $host= "tu-gestor-de-productos-db.mysql.database.azure.com";
    private $database_name = "tugestordeproductosdb";
    private $username = "roberto";
    private $password="Lic291198";

    public $conn;

    public function getConnection(){
        $this->conn = null;
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database_name,$this->username,$this->password);
            $response = $this->conn;

        }catch(PDOException $e){
            $response = false;
        }
        
        return $response;
    }
    
}
    
?>