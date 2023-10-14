<?php
    
class Connection {
    // Localhost
    // private $host = "localhost";
    // private $db_name = "test";
    // private $username = "root";
    // private $password = "";


    private $host= "tu-gestor-de-productos-db.mysql.database.azure.com";
    private $db_name = "tugestordeproductosdb";
    private $username = "roberto";
    private $password="Lic291198";

    public $conn;

    public function getConnection(){
        $this->conn = null;
        
        $this->conn =  new mysqli($this->host, $this->username, $this->password, $this->db_name);
        $response = $this->conn;

        if ($this->conn->connect_error) {
            echo("Error de conexión: " . $conn->connect_error);
        }

        return $response;
    }
    
}
    
?>