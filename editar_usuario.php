<?php
require_once("model/connection.php");
$connection = new Connection();
$conn = $connection->getConnection();

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/editar.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

<?php
if (isset($_GET['editar'])) {
    $usuarioAEditar = $_GET['editar'];
    // Consulta SQL para obtener los datos del usuario a editar
    $sql = "SELECT usuario_id, usuario, correo FROM usuario WHERE usuario_id = ? LIMIT 1";
    $result = $conn->prepare($sql);

    if ($result) {
        $result->bind_param("i", $usuarioAEditar);
        $result->execute();

        $result->bind_result($id, $nombre, $correo);
        $row = $result->fetch();
        
        if ($id !== null) {  
            echo "<form method='post' action='controlador_editar.php'>";
            echo "<p>ID usuario</p>";
            echo "<input name='id' value='$id' readonly>";
            echo "<p>Usuario</p>";
            echo "<input name='nombre' value='$nombre'>";
            echo "<p>Correo</p>";
            echo "<input name='correo' value='$correo'>";
            echo "<input type='submit' value='Editar'>";
            echo "</form>";
        } else {
            echo "Usuario no encontrado.";
        }
        $result->close();
    } 
    else {
        echo "Error en la preparación de la consulta: " . $conn->error;
        exit;
    }
}
?>
    <a href="mostrar_usuarios.php"><p>Regresar</p></a>
</body>
</html>
