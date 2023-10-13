<?php
require_once("../model/connection.php");


// Generamos una objeto de nuestra estructura Connection para crear una nueva conexion a nuestra base de datos
$connection = new Connection();
$conn = $connection->getConnection();

//Validamos que la conexion haya sido exitosa
if($conn){

    $usuario = $_POST["usuario"];
    $pass = $_POST["pass"];

    $sql = "SELECT * FROM `usuario` WHERE usuario = :usuario AND pass = :pass";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam('usuario', $usuario);
    $stmt->bindParam(':pass', $pass);

    $user = $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);


    if ($result) {
        session_start();
        $_SESSION['usuario'] = $usuario;
        header('Location: ../inicio.php');
    } else {
        header('Location: ../index.php?error=contrasena');
    }

}else{
    header('Location: ../index.php?error=db');
}




?>