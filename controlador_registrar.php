<?php
require_once("model/connection.php");

// Generamos una objeto de nuestra estructura Connection para crear una nueva conexion a nuestra base de datos
$connection = new Connection();
$conn = $connection->getConnection();


//Validamos que la conexion haya sido exitosa
if($conn){

    $nombre = $_POST['usuario'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['pass'];
    $tipo = 'usuario';

    // Insertamos los datos de registro a la base de datos
    $sql = "INSERT INTO `usuario`(`usuario`, `correo`, `pass`, `tipo`) VALUES (:usuario, :correo, :pass, :tipo)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':usuario', $nombre, PDO::PARAM_STR);
    $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
    $stmt->bindParam(':pass', $contrasena, PDO::PARAM_STR);
    $stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);
    $stmt->execute();

    header('Location: bienvenido.php');

}else{
    echo "Fallo al conectar base de datos";
}
?>
