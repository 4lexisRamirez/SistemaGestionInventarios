<?php
// productos.php

include 'conexion.php';

// Función para obtener productos con filtro de búsqueda
function getProductos($pdo, $searchName = '', $categoryId = '') {
    $sql = "SELECT p.id_producto, p.nombre, p.descripcion, p.marca, p.modelo, 
                   p.id_categoria, c.nombre_categoria, p.fecha_ingreso, p.stock 
            FROM productos p 
            LEFT JOIN categorias c ON p.id_categoria = c.id_categoria
            WHERE 1 = 1";

    // Filtros de búsqueda
    if ($searchName) {
        $sql .= " AND p.nombre LIKE :search_name";
    }
    if ($categoryId) {
        $sql .= " AND p.id_categoria = :category_id";
    }

    $stmt = $pdo->prepare($sql);

    // Vincular parámetros
    if ($searchName) {
        $stmt->bindValue(':search_name', "%$searchName%");
    }
    if ($categoryId) {
        $stmt->bindValue(':category_id', $categoryId, PDO::PARAM_INT);
    }

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Obtener productos con filtros si existen
$searchName = isset($_GET['search_name']) ? $_GET['search_name'] : '';
$categoryId = isset($_GET['category']) ? $_GET['category'] : '';
$productos = getProductos($pdo, $searchName, $categoryId);

// Mostrar la tabla de productos
function mostrarProductos($productos) {
    foreach ($productos as $producto) {
        echo "<tr>";
        echo "<td>{$producto['id_producto']}</td>";
        echo "<td>" . htmlspecialchars($producto['nombre']) . "</td>";
        echo "<td>" . htmlspecialchars($producto['descripcion']) . "</td>";
        echo "<td>" . htmlspecialchars($producto['marca']) . "</td>";
        echo "<td>" . htmlspecialchars($producto['modelo']) . "</td>";
        echo "<td title='ID: " . htmlspecialchars($producto['id_categoria']) . "'>" . htmlspecialchars($producto['nombre_categoria']) . "</td>";
        echo "<td>" . htmlspecialchars($producto['fecha_ingreso']) . "</td>";
        echo "<td>" . htmlspecialchars($producto['stock']) . "</td>";
        echo "<td>
                <a href='editarProducto.php?id={$producto['id_producto']}'>Editar</a> |
                <a href='eliminarProducto.php?id={$producto['id_producto']}' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este producto?\")'>Eliminar</a>
              </td>";
        echo "</tr>";
    }
}
?>
