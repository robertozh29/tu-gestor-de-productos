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
    <link rel="stylesheet" type="text/css" href="styles/inicio.css">
</head>
<body>
    <header>
        <h1>Tu gestor de productos</h1>
        <form action="close_sessions.php" method="post">
            <input type="submit" value="Cerrar Sesión">
        </form>
    </header>
    <main>
        
        <div class="opciones">
            <div class="contenedor-opcion" id="usuarios">
                <img src="assets/usuarios.jpg" alt="">
                <p>Mis usuarios</p>
            </div>
            <div class="contenedor-opcion" id="productos">
                <img src="assets/almacen.jpg" alt="">
                <p>Mis productos</p>
            </div>
        </div>

    </main>
    
    <footer>
        <p>&copy; <?php echo date("Y"); ?> - Tu gestor de productos</p>
    </footer>

    <script src="functions.js"></script>
</body>
</html>
