<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/login-style.css">
    <title>Login</title>
</head>
<body>
    <div class="login container">
        <h1>Tu gestor de productos</h1>
        <form action="login_controller.php" method="post">
            <input type="text" placeholder="USUARIO" name="usuario" id="user">
            <input type="password" placeholder="CONTRASEÑA" name="pass" id="password">
            <input type="submit" value="Iniciar sesión">
            <?php
                //Validamos si el usuario o contrasena son correctos de lo contrario ensenamos este mensaje
                if (isset($_GET['error']) && $_GET['error'] === 'contrasena') {
                    echo "<p class='error'>La contraseña y/o usuario son incorrectos. Inténtalo de nuevo.</p>";
                }
                //Validamos que la conexion a la base de datos se correcto de lo contrario ensenamos este mensaje
                else if (isset($_GET['error']) && $_GET['error'] === 'db') {
                    echo "<p class='error'>Fallo al conectar base de datos </p>";
                }
            ?>
            <hr/>
            <a href="registrar.php">Registrar</a>
        </form>
    </div> 
</body>
</html>