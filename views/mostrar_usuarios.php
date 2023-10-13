<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../styles/inicio.css">
    <title>Lista de Usuarios</title>
</head>
<body>
    <div class="mostrar-usurios">
        <header>
            <a href="inicio.php"><h1>Tu gestor de productos</h1></a>
        </header>

        <h1>Lista de Usuarios</h1>

        <?php
        require_once("../model/connection.php");
        $connection = new Connection();
        $conn = $connection->getConnection();

        if($conn) {
            // Generamos una objeto de nuestra estructura Connection para crear una nueva conexion a nuestra base de datos
            

            // Query para obtener todos los usuarios
            $query = "SELECT COUNT(*) FROM `usuario`";

            // Comprobar si se encontraron usuarios
            if ($res = $conn->query($query)) {

                if ($res->fetchColumn() > 0) {
                    echo "<table border='1'>
                        <tr>
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Correo</th>
                            <th>Tipo</th>
                        </tr>";
                    
                    $sql = "SELECT `usuario_id`, `usuario`, `correo`, `pass`, `tipo` FROM `usuario`";
                    foreach ($conn->query($sql) as $row){
                        echo "<tr>
                            <td>{$row['usuario_id']}</td>
                            <td>{$row['usuario']}</td>
                            <td>{$row['correo']}</td>
                            <td>{$row['tipo']}</td>
                        </tr>";
                    }

                    echo "</table>";
                }
            }
        } 
        ?>

        <a href="inicio.php"><p>Pagina de inicio</p></a>
    </div>

</body>
</html>
