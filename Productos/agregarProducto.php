<?php
include 'conexion.php';

// Cambia 'id' a 'id_categoria' si ese es el nombre correcto en tu base de datos
$sql_categorias = "SELECT id_categoria, nombre_categoria FROM categorias";
$stmt_categorias = $pdo->query($sql_categorias);
$categorias = $stmt_categorias->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $categoria = $_POST['categoria'];
    $fecha_ingreso = $_POST['fecha_ingreso'];
    $stock = $_POST['stock'];

    $sql = "INSERT INTO productos (nombre, descripcion, marca, modelo, id_categoria, fecha_ingreso, stock) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nombre, $descripcion, $marca, $modelo, $categoria, $fecha_ingreso, $stock]);

    header("Location: productos.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Producto</title>
</head>
<body>
    <h2>Agregar Nuevo Producto</h2>
    <form method="POST">
        <label>Nombre: <input type="text" name="nombre" required></label><br>
        <label>Descripción: <input type="text" name="descripcion" required></label><br>
        <label>Marca: <input type="text" name="marca" required></label><br>
        <label>Modelo: <input type="text" name="modelo" required></label><br>
        
        <label>Categoría:
            <select name="categoria" required>
                <option value="">Seleccione una categoría</option>
                <?php foreach ($categorias as $categoria): ?>
                    <option value="<?php echo $categoria['id_categoria']; ?>">
                        <?php echo htmlspecialchars($categoria['nombre_categoria']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label><br>
        
        <label>Fecha de Ingreso: <input type="date" name="fecha_ingreso" required></label><br>
        <label>Stock: <input type="number" name="stock" required></label><br>
        <button type="submit">Agregar Producto</button>
    </form>
</body>
</html>
