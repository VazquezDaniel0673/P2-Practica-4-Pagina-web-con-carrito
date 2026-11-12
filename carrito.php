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

if (isset($_POST['vaciar'])) {
    $_SESSION['carrito'] = array();
    $mensaje = "Carrito vaciado.";
}

if (isset($_POST['confirmar_compra']) && !empty($_SESSION['carrito'])) {
    $usuario_nombre = $_SESSION['usuario'];

    $stmt_user = $conn->prepare("SELECT id FROM usuarios WHERE usuario = ?");
    $stmt_user->bind_param("s", $usuario_nombre);
    $stmt_user->execute();
    $res = $stmt_user->get_result();

    if ($row = $res->fetch_assoc()) {
        $usuario_id = $row['id'];

        $stmt_compra = $conn->prepare("INSERT INTO compras (usuario_id, producto) VALUES (?, ?)");

        foreach ($_SESSION['carrito'] as $producto) {
            $stmt_compra->bind_param("is", $usuario_id, $producto);
            $stmt_compra->execute();
        }

        $stmt_compra->close();
        $_SESSION['carrito'] = array();
        $mensaje = "¡Compra realizada con éxito!";
    }
    $stmt_user->close();
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
        body { font-family: 'Roboto Mono', monospace; color: #111; padding: 40px 20px; max-width: 700px; margin: 0 auto; text-align: center; }
        header h1 { font-size: 2rem; letter-spacing: 0.2em; text-transform: uppercase; margin-bottom: 20px; }
        nav ul { display: flex; justify-content: center; gap: 20px; list-style: none; margin-bottom: 40px; }
        nav a { color: #666; text-decoration: none; font-size: 0.85rem; text-transform: uppercase; }
        h2 { font-size: 1rem; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; margin-bottom: 20px; }
        th, td { border: 1px solid #111; padding: 12px; text-align: center; font-size: 0.85rem; }
        th { background-color: #111; color: #fff; text-transform: uppercase; }
        .btn-group { display: flex; gap: 10px; max-width: 400px; margin: 0 auto; }
        .btn { font-family: 'Roboto Mono', monospace; flex: 1; padding: 12px; text-transform: uppercase; font-weight: 700; border: 1px solid #111; cursor: pointer; background: #fff; }
        .btn.submit { background: #111; color: #fff; }
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
        <h2>Mi Carrito de Compras</h2>

        <?php if (!empty($mensaje)): ?>
            <p class="mensaje"><?php echo htmlspecialchars($mensaje); ?></p>
        <?php endif; ?>

        <?php if (!empty($_SESSION['carrito'])): ?>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Producto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['carrito'] as $indice => $item): ?>
                        <tr>
                            <td><?php echo $indice + 1; ?></td>
                            <td><?php echo htmlspecialchars($item); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <form action="carrito.php" method="POST">
                <div class="btn-group">
                    <button type="submit" name="confirmar_compra" class="btn submit">Finalizar Compra</button>
                    <button type="submit" name="vaciar" class="btn">Vaciar Carrito</button>
                </div>
            </form>
        <?php else: ?>
            <p>El carrito está vacío.</p>
        <?php endif; ?>
    </main>

    <footer>
        <p>Daniel Vazquez Montañez | 5ºI | 24308051280673</p>
    </footer>

</body>
</html>