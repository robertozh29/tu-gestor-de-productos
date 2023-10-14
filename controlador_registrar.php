<?php 
require_once("model/connection.php");

// Generamos una objeto de nuestra estructura Connection para crear una nueva conexion a nuestra base de datos
//$connection = new Connection();
//$conn = $connection->getConnection();

$conn = false;
if($conn){
    $nombre = $_POST['usuario'];
    $correo = $_POST['correo'];
    $pass = $_POST['pass'];
    $tipo = 'usuario';

    // Insertamos los datos de registro a la base de datos
    $sql = "INSERT INTO `usuario`(`usuario`, `correo`, `pass`, `tipo`) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if($stmt){
        $stmt->bind_param("ssss", $nombre, $correo, $pass, $tipo);

        // Ejecutar query
        if ($stmt->execute()) {
                session_start();
                $_SESSION['bienvenido'] = true;
                header('Location: bienvenido.php');;
        } else {
            echo "Error al ejecutar la consulta de inserción: " . $stmt->error;
        }


        $stmt->close();
    }
    else{
        echo("conexion faliida");
    }

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