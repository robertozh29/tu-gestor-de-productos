<?php 
require_once("model/connection.php");

// Generamos una objeto de nuestra estructura Connection para crear una nueva conexion a nuestra base de datos
$connection = new Connection();
$conn = $connection->getConnection();

if($conn){
    $nombre = $_POST['usuario'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['pass'];
    $tipo = 'usuario';

    // Insertamos los datos de registro a la base de datos
    $sql = "INSERT INTO `usuario`(`usuario`, `correo`, `pass`, `tipo`) VALUES (:usuario, :correo, :pass, :tipo)";
    $stmt = mysqli_prepare($conn, $sql);

    $stmt = $conn->prepare($sql);
    mysqli_stmt_bind_param($stmt, ':usuario', $nombre);
    mysqli_stmt_bind_param($stmt, ':correo', $correo);
    mysqli_stmt_bind_param($stmt, ':pass', $contrasena);
    mysqli_stmt_bind_param($stmt, ':tipo', $tipo);

    $stmt->execute();

    echo("conexion exitosa!" . $nombre);
}
else{
    echo("Conexion fallida");
}
?>