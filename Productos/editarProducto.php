<?php
include 'conexion.php';

// Obtener el producto actual
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM productos WHERE id_producto = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $producto = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$producto) {
        echo "Producto no encontrado.";
        exit;
    }
}

// Obtener las categorías disponibles
$sql = "SELECT id_categoria, nombre_categoria FROM categorias";
$stmt = $pdo->query($sql);
$categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Actualizar el producto
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $categoria = $_POST['categoria']; // ID de la categoría seleccionada
    $fecha_ingreso = $_POST['fecha_ingreso'];
    $stock = $_POST['stock'];

    $sql = "UPDATE productos SET nombre=?, descripcion=?, marca=?, modelo=?, id_categoria=?, fecha_ingreso=?, stock=? WHERE id_producto=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nombre, $descripcion, $marca, $modelo, $categoria, $fecha_ingreso, $stock, $id]);

    header("Location: productos.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
</head>
<body>
    <h2>Editar Producto</h2>
    <form method="POST">
        <label>Nombre: <input type="text" name="nombre" value="<?= htmlspecialchars($producto['nombre']) ?>" required></label><br>
        <label>Descripción: <input type="text" name="descripcion" value="<?= htmlspecialchars($producto['descripcion']) ?>" required></label><br>
        <label>Marca: <input type="text" name="marca" value="<?= htmlspecialchars($producto['marca']) ?>" required></label><br>
        <label>Modelo: <input type="text" name="modelo" value="<?= htmlspecialchars($producto['modelo']) ?>" required></label><br>
        <label>Categoría:
            <select name="categoria" required>
                <?php foreach ($categorias as $categoria): ?>
                    <option value="<?= $categoria['id_categoria'] ?>" 
                        <?= $producto['id_categoria'] == $categoria['id_categoria'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($categoria['nombre_categoria']) ?>
                    </option>
                <?php endforeach; ?>
                <option value="nueva_categoria">Agregar nueva categoría...</option>
            </select>
        </label><br>
        <label>Fecha de Ingreso: <input type="date" name="fecha_ingreso" value="<?= htmlspecialchars($producto['fecha_ingreso']) ?>" required></label><br>
        <label>Stock: <input type="number" name="stock" value="<?= htmlspecialchars($producto['stock']) ?>" required></label><br>
        <button type="submit">Guardar Cambios</button>
    </form>

    <!-- Redirección para agregar una nueva categoría -->
    <script>
    document.querySelector('select[name="categoria"]').addEventListener('change', function() {
        if (this.value === 'nueva_categoria') {
            // Obtener el id del producto que se está editando
            const productoId = new URLSearchParams(window.location.search).get('id');
            // Redirigir a agregarCategoria.php pasando el id como parámetro
            window.location.href = 'agregarCategoria.php?id=' + productoId;
        }
    });
</script>

</body>
</html>
