<?php
include 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM productos WHERE id_producto = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    header("Location: productos.php");
    exit;
} else {
    echo "ID de producto no proporcionado.";
}
?>
