<?php
include 'conexion.php';

// Obtener todas las categorías
$sql = "SELECT * FROM categorias";
$stmt = $pdo->query($sql);
$categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Manejar la eliminación de categorías
if (isset($_GET['eliminar']) && is_numeric($_GET['eliminar'])) {
    $id_categoria = $_GET['eliminar'];

    // Reasignar productos a la categoría con ID 1
    $sql = "UPDATE productos SET id_categoria = 1 WHERE id_categoria = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_categoria]);

    // Eliminar la categoría
    $sql = "DELETE FROM categorias WHERE id_categoria = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_categoria]);

    header("Location: gestionarCategorias.php?mensaje=eliminado");
    exit;
}

// Notificación al usuario
$mensaje = "";
if (isset($_GET['mensaje']) && $_GET['mensaje'] === "eliminado") {
    $mensaje = "La categoría ha sido eliminada. Los productos han sido asignados a la categoría con ID 1.";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestionar Categorías</title>
</head>
<body>
    <h2>Gestionar Categorías</h2>
    <?php if ($mensaje): ?>
        <p style="color: green;"><?= htmlspecialchars($mensaje) ?></p>
    <?php endif; ?>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre de la Categoría</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($categorias as $categoria): ?>
            <tr>
                <td><?= htmlspecialchars($categoria['id_categoria']) ?></td>
                <td><?= htmlspecialchars($categoria['nombre_categoria']) ?></td>
                <td>
                    <a href="editarCategoria.php?id=<?= $categoria['id_categoria'] ?>">Editar</a>
                    <a href="gestionarCategorias.php?eliminar=<?= $categoria['id_categoria'] ?>" onclick="return confirm('¿Seguro que deseas eliminar esta categoría? Los productos serán reasignados a la categoría con ID 1.')">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="agregarCategoria.php" style="display: inline-block; padding: 10px; background-color: #28a745; color: white; text-decoration: none; border-radius: 5px;">Agregar Nueva Categoría</a>
</body>
</html>
