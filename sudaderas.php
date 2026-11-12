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

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['producto'])) {
    $producto = $_POST['producto'];
    $_SESSION['carrito'][] = $producto;
    $mensaje = "¡Producto agregado al carrito!";
}
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
        body { font-family: 'Roboto Mono', monospace; color: #111; padding: 40px 20px; max-width: 900px; margin: 0 auto; text-align: center; }
        header h1 { font-size: 2rem; letter-spacing: 0.2em; text-transform: uppercase; margin-bottom: 20px; }
        nav ul { display: flex; justify-content: center; gap: 20px; list-style: none; margin-bottom: 40px; }
        nav a { color: #666; text-decoration: none; font-size: 0.85rem; text-transform: uppercase; }
        h2 { font-size: 1rem; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 20px; }
        
        .galeria-productos { display: flex; justify-content: center; gap: 20px; flex-wrap: wrap; margin-bottom: 30px; }
        .tarjeta-producto { border: 1px solid #eee; padding: 15px; width: 180px; display: flex; flex-direction: column; align-items: center; justify-content: space-between; }
        .tarjeta-producto img { width: 120px; height: auto; margin-bottom: 10px; }
        .nombre-prod { font-size: 0.75rem; font-weight: bold; margin-bottom: 5px; }
        .precio-prod { font-size: 0.85rem; color: #444; margin-bottom: 10px; }
        
        .btn-agregar { font-family: 'Roboto Mono', monospace; width: 100%; padding: 8px; text-transform: uppercase; font-size: 0.7rem; font-weight: 700; border: 1px solid #111; background: #111; color: #fff; cursor: pointer; }
        .mensaje { font-weight: bold; margin-bottom: 15px; color: green; }
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

    <main>
        <h2>Productos</h2>

        <?php if (!empty($mensaje)): ?>
            <p class="mensaje"><?php echo htmlspecialchars($mensaje); ?></p>
        <?php endif; ?>

        <div class="galeria-productos">
            <div class="tarjeta-producto">
                <img src="sud1.png" alt="Carhartt Santa Fe Jacket Brown">
                <p class="nombre-prod">Carhartt Santa Fe Jacket Brown</p>
                <p class="precio-prod">$2,400.00 MXN</p>
                <form action="sudaderas.php" method="POST">
                    <input type="hidden" name="producto" value="Carhartt Santa Fe Jacket Brown">
                    <button type="submit" class="btn-agregar">Agregar al Carrito</button>
                </form>
            </div>

            <div class="tarjeta-producto">
                <img src="sud2.png" alt="Carhartt Detroit Jacket Washed Black">
                <p class="nombre-prod">Carhartt Detroit Jacket Washed Black</p>
                <p class="precio-prod">$2,600.00 MXN</p>
                <form action="sudaderas.php" method="POST">
                    <input type="hidden" name="producto" value="Carhartt Detroit Jacket Washed Black">
                    <button type="submit" class="btn-agregar">Agregar al Carrito</button>
                </form>
            </div>

            <div class="tarjeta-producto">
                <img src="sud3.png" alt="Carhartt Canvas Trucker Jacket Tan">
                <p class="nombre-prod">Carhartt Canvas Trucker Jacket Tan</p>
                <p class="precio-prod">$2,200.00 MXN</p>
                <form action="sudaderas.php" method="POST">
                    <input type="hidden" name="producto" value="Carhartt Canvas Trucker Jacket Tan">
                    <button type="submit" class="btn-agregar">Agregar al Carrito</button>
                </form>
            </div>

            <div class="tarjeta-producto">
                <img src="sud4.png" alt="Carhartt Active Jacket Camo">
                <p class="nombre-prod">Carhartt Active Jacket Camo</p>
                <p class="precio-prod">$2,800.00 MXN</p>
                <form action="sudaderas.php" method="POST">
                    <input type="hidden" name="producto" value="Carhartt Active Jacket Camo">
                    <button type="submit" class="btn-agregar">Agregar al Carrito</button>
                </form>
            </div>

            <div class="tarjeta-producto">
                <img src="sud5.png" alt="Carhartt Active Jacket Black">
                <p class="nombre-prod">Carhartt Active Jacket Black</p>
                <p class="precio-prod">$2,500.00 MXN</p>
                <form action="sudaderas.php" method="POST">
                    <input type="hidden" name="producto" value="Carhartt Active Jacket Black">
                    <button type="submit" class="btn-agregar">Agregar al Carrito</button>
                </form>
            </div>

            <div class="tarjeta-producto">
                <img src="sud6.png" alt="Carhartt Chore Coat Olive Green">
                <p class="nombre-prod">Carhartt Chore Coat Olive Green</p>
                <p class="precio-prod">$2,700.00 MXN</p>
                <form action="sudaderas.php" method="POST">
                    <input type="hidden" name="producto" value="Carhartt Chore Coat Olive Green">
                    <button type="submit" class="btn-agregar">Agregar al Carrito</button>
                </form>
            </div>

            <div class="tarjeta-producto">
                <img src="sud7.png" alt="Carhartt Detroit Denim Jacket Blue">
                <p class="nombre-prod">Carhartt Detroit Denim Jacket Blue</p>
                <p class="precio-prod">$2,300.00 MXN</p>
                <form action="sudaderas.php" method="POST">
                    <input type="hidden" name="producto" value="Carhartt Detroit Denim Jacket Blue">
                    <button type="submit" class="btn-agregar">Agregar al Carrito</button>
                </form>
            </div>

            <div class="tarjeta-producto">
                <img src="sud8.png" alt="Carhartt Prentis Fleece Jacket Beige">
                <p class="nombre-prod">Carhartt Prentis Fleece Jacket Beige</p>
                <p class="precio-prod">$2,100.00 MXN</p>
                <form action="sudaderas.php" method="POST">
                    <input type="hidden" name="producto" value="Carhartt Prentis Fleece Jacket Beige">
                    <button type="submit" class="btn-agregar">Agregar al Carrito</button>
                </form>
            </div>

            <div class="tarjeta-producto">
                <img src="sud9.png" alt="Carhartt Active Jacket Dark Brown">
                <p class="nombre-prod">Carhartt Active Jacket Dark Brown</p>
                <p class="precio-prod">$2,500.00 MXN</p>
                <form action="sudaderas.php" method="POST">
                    <input type="hidden" name="producto" value="Carhartt Active Jacket Dark Brown">
                    <button type="submit" class="btn-agregar">Agregar al Carrito</button>
                </form>
            </div>

            <div class="tarjeta-producto">
                <img src="sud10.png" alt="Carhartt Classic Vest Black">
                <p class="nombre-prod">Carhartt Classic Vest Black</p>
                <p class="precio-prod">$1,900.00 MXN</p>
                <form action="sudaderas.php" method="POST">
                    <input type="hidden" name="producto" value="Carhartt Classic Vest Black">
                    <button type="submit" class="btn-agregar">Agregar al Carrito</button>
                </form>
            </div>
        </div>
    </main>

    <footer>
        <p>Daniel Vazquez Montañez | 5ºI | 24308051280673</p>
    </footer>

</body>
</html>