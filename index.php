<?php
session_start();
require_once 'conexion.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: cuenta.php");
    exit();
}

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

$usuario_nombre = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Carhartt</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Roboto Mono', monospace; color: #111; padding: 40px 20px; max-width: 700px; margin: 0 auto; text-align: center; }
        header h1 { font-size: 2rem; letter-spacing: 0.2em; text-transform: uppercase; margin-bottom: 20px; }
        nav ul { display: flex; justify-content: center; gap: 20px; list-style: none; margin-bottom: 40px; }
        nav a { color: #666; text-decoration: none; font-size: 0.85rem; text-transform: uppercase; }
        .saludo { font-size: 1.2rem; font-weight: bold; margin-bottom: 20px; text-transform: uppercase; }
        .galeria-imagenes { display: flex; justify-content: center; gap: 10px; flex-wrap: wrap; margin-bottom: 30px; }
        .galeria-imagenes img { width: 300px; height: auto; border: 1px solid #eee; }
        footer { margin-top: 60px; font-size: 0.7rem; color: #888; letter-spacing: 0.1em; }
    </style>
</head>
<body>

    <header>
        <h1>Carhartt</h1>
    </header>

    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="camisas.php">Camisas</a></li>
            <li><a href="sudaderas.php">Sudaderas</a></li>
            <li><a href="pantalones.php">Pantalones</a></li>
            <li><a href="accesorios.php">Accesorios</a></li>
            <li><a href="carrito.php">Carrito (<?php echo count($_SESSION['carrito']); ?>)</a></li>
            <li><a href="mis_compras.php">Mis Compras</a></li>
            <li><a href="cuenta.php">Cuenta</a></li>
            <li><a href="logout.php">Cerrar Sesión</a></li>
        </ul>
    </nav>

    <p class="saludo">Hola, <?php echo htmlspecialchars($usuario_nombre); ?></p>

    <p>Carhartt WIP remezcla la esencia de la ropa de trabajo estadounidense con la cultura urbana europea. Ofrecemos prendas duraderas y funcionales adaptadas al diseño contemporáneo, la música, el arte y el skate. Calidad atemporal diseñada para la vida en la ciudad.</p><br>

    <div class="galeria-imagenes">
        <a href="camisas.php">
            <img src="cam11.jpg" alt="camisas">
        </a>
        <a href="pantalones.php">
            <img src="pan11.png" alt="pantalones">
        </a>
        <a href="accesorios.php">
            <img src="acc11.jpg" alt="accesorios">
        </a>
        <a href="sudaderas.php">
            <img src="sud11.jpg" alt="sudaderas">
        </a>
    </div>

    <footer>
        <p>Daniel Vazquez Montañez | 5ºI | 24308051280673</p>
    </footer>

</body>
</html>