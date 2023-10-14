<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles/inicio.css">
    <title>Lista de Usuarios</title>
</head>
<body>
    <div class="mostrar-usurios">
        <header>
            <a href="inicio.php"><h1>Tu gestor de productos</h1></a>
        </header>

        <h1>Lista de Usuarios</h1>

        <?php
        require_once("model/connection.php");
        $connection = new Connection();
        $conn = $connection->getConnection();

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Comprobar si se ha enviado una solicitud de eliminación
        if (isset($_GET['eliminar'])) {
            $usuarioAEliminar = $_GET['eliminar'];
            // Aquí debes agregar la lógica para eliminar al usuario de la base de datos.
            // Puedes usar una consulta DELETE para esto.
            $sql = "DELETE FROM usuario WHERE usuario_id = $usuarioAEliminar";
            if ($conn->query($sql) === TRUE) {
                echo "Usuario eliminado correctamente.";
            } else {
                echo "Error al eliminar al usuario: " . $conn->error;
            }
        }
        
        // Query para obtener todos los usuarios
        $sql = "SELECT * FROM usuario";
        $result = $conn->query($sql);
        
        // Ejecutar la consulta
        if ($result) {
            echo "<table border='1' class='mostrar'>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Correo</th>
                        <th>Administrar</th>
                    </tr>";
            
            while ($row = $result->fetch_assoc()){
                echo "<tr>";
                    echo "<td>" . $row['usuario_id'] . "</td>";
                    echo "<td>" . $row['usuario'] . "</td>";
                    echo "<td>" . $row['correo'] . "</td>";
                    echo "<td class='admin'>";
                    echo "<a href='?eliminar=" . $row['usuario_id'] . "'>Eliminar</a>";
                    echo "</td>";
                echo "</tr>";
            }

            echo "</table>";
        }

        ?>

        <a href="inicio.php"><p>Pagina de inicio</p></a>
    </div>

</body>
</html>