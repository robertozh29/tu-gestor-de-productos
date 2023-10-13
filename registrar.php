<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles/login-style.css">
    <title>Formulario de Registro</title>
</head>
<body>
    <div class="login container">
        <h1>Registrarse</h1>

        <form action="register_controller.php" method="post">
            <label for="usuario">Nombre de usuario:</label>
            <input type="text" name="usuario" id="usuario" required><br>

            <label for="correo">Correo Electrónico:</label>
            <input type="email" name="correo" id="correo" required><br>

            <label for="pass">Contraseña:</label>
            <input type="password" name="pass" id="pass" required><br>

            <input type="submit" value="Registrar">
        </form>
    </div>
</body>
</html>
