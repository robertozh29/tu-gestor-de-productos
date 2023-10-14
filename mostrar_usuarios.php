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

        // Query para obtener todos los usuarios
        $sql = "SELECT * FROM usuario";
        $result = $conn->query($sql);
        
        // Ejecutar la consulta
        if ($result) {
            echo "<table border='1'>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Correo</th>
                    </tr>";
            
            while ($row = $result->fetch_assoc()){
                echo "<tr>";
                    echo "<td>" . $row['usuario_id'] . "</td>";
                    echo "<td>" . $row['usuario'] . "</td>";
                    echo "<td>" . $row['correo'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        }

        ?>

        <a href="inicio.php"><p>Pagina de inicio</p></a>
    </div>

</body>
</html>