<?php
session_start();

if (!$_SESSION['usuario']) {
    header('Location: ../views/login.php');
} 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Página de Bienvenida</title>
    <link rel="stylesheet" type="text/css" href="../styles/inicio.css">
</head>
<body>
    <header>
        <h1>Tu gestor de productos</h1>
    </header>
    <p class="welcome">Gracias por visitar tu gestor de productos<?php $_SESSION['usuario']; ?></p>
    <main>
        
        <a href="mostrar_usuarios.php"><p>Mostrar usuarios</p></a>
        <form action="../controller/close_sessions.php" method="post">
            <input type="submit" value="Cerrar Sesión">
        </form>
    </main>
    
    <footer>
        <p>&copy; <?php echo date("Y"); ?> - Tu gestor de productos</p>
    </footer>
</body>
</html>
