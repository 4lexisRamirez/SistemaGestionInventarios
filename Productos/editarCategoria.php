<?php
include 'conexion.php';

// Validar y obtener datos de la categoría a editar
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID de categoría no válido.");
}

$id_categoria = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Actualizar la categoría
    $nombre_categoria = $_POST['nombre_categoria'];
    $sql = "UPDATE categorias SET nombre_categoria = ? WHERE id_categoria = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nombre_categoria, $id_categoria]);

    header("Location: gestionarCategorias.php?mensaje=editado");
    exit;
}

// Obtener la información de la categoría
$sql = "SELECT * FROM categorias WHERE id_categoria = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id_categoria]);
$categoria = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$categoria) {
    die("Categoría no encontrada.");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Categoría</title>
</head>
<body>
    <h2>Editar Categoría</h2>
    <form action="editarCategoria.php?id=<?= $id_categoria ?>" method="POST">
        <label for="nombre_categoria">Nombre de la Categoría:</label>
        <input type="text" id="nombre_categoria" name="nombre_categoria" value="<?= htmlspecialchars($categoria['nombre_categoria']) ?>" required>
        <br><br>
        <button type="submit">Guardar Cambios</button>
        <a href="gestionarCategorias.php" style="margin-left: 10px;">Cancelar</a>
    </form>
</body>
</html>
