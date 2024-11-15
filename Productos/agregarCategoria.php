<?php
include 'conexion.php';

// Manejo del formulario de nueva categoría
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nueva_categoria = $_POST['nombre_categoria'];

    // Insertar la nueva categoría en la base de datos
    $sql = "INSERT INTO categorias (nombre_categoria) VALUES (?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nueva_categoria]);

    // Redirigir al formulario de edición del producto
    header("Location: editarProducto.php?id=" . htmlspecialchars($_GET['id']));
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Nueva Categoría</title>
</head>
<body>
    <h2>Agregar Nueva Categoría</h2>
    <form method="POST">
        <label>Nombre de la Nueva Categoría: <input type="text" name="nombre_categoria" required></label><br>
        <button type="submit">Agregar Categoría</button>
    </form>
    <br>
    <!-- Botón para gestionar todas las categorías -->
    <a href="gestionarCategorias.php" style="display: inline-block; padding: 10px; background-color: #007BFF; color: white; text-decoration: none; border-radius: 5px;">Gestionar Categorías</a>
</body>
</html>
