<?php
require_once("model/connection.php");

// Generamos una objeto de nuestra estructura Connection para crear una nueva conexion a nuestra base de datos
$connection = new Connection();
$conn = $connection->getConnection();


//Validamos que la conexion haya sido exitosa
if($conn){

    $usuario = $_POST["usuario"];
    $pass = $_POST["pass"];

    // preparamos los datos de registro a la base de datos
    $sql = "SELECT * FROM `usuario` WHERE usuario = ? AND pass = ?";
    $stmt = $conn->prepare($sql);
    
    if($stmt){
        $stmt->bind_param("ss", $usuario, $pass);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Obtener resultados
            $result = $stmt->get_result();

            if($result->num_rows > 0){
                $result->close();
                session_start();
                $_SESSION['usuario'] = $usuario;
                header('Location: inicio.php');
            }
            else {
                echo "No se obtuvieron resultados.";
            }               
        }
        else {
            echo "Error al ejecutar la consulta: " . $stmt->error;
        }

        $stmt->close();
    }else{
        echo("conexion faliida");
    }


    $conn->close();
}






?>