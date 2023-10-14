<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    
    require_once("model/connection.php");
    $connection = new Connection();
    $conn = $connection->getConnection();

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];


    // Consulta SQL para actualizar los datos del usuario
    $sql = "UPDATE usuario SET usuario = ?, correo = ? WHERE usuario_id = ?";
    $stmt = $conn->prepare($sql);

    if($stmt){
        $stmt->bind_param("ssi", $nombre, $correo, $id);

        if ($stmt->execute()) {
            header('Location: mostrar_usuarios.php');
        } else {
            echo "Error al actualizar el usuario: " . $stmt->error;
        }

        $stmt->close();
    }
    else{

        die("Error en la preparación de la consulta: " . $conn->error);

        echo("conexion faliida");
    }

    $conn->close();
}
?>