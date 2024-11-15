<?php
// pantallaPrincipal.php

include 'conexion.php';
include 'productos.php';  // Incluir el archivo que maneja los productos

// Obtener categorías para el filtro
function getCategorias($pdo) {
    $sql = "SELECT id_categoria, nombre_categoria FROM categorias";
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}
$categorias = getCategorias($pdo);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlowStock</title>
    <style>
        /* Estilos básicos */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        /* Barra de navegación principal */
        .navbar {
            background-color: #273157;
            color: white;
            padding: 7px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h1 {
            margin: 0;
            font-size: 24px;
        }

        /* Menú hamburguesa */
        .menu-icon {
            display: none;
            cursor: pointer;
        }

        .menu-icon div {
            width: 30px;
            height: 4px;
            margin: 6px 0;
            background-color: white;
            transition: 0.4s;
        }

        .subnavbar {
            background-color: #4a79ab;
            display: flex;
            padding: 3px;
            justify-content: center;
        }

        .subnavbar a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            padding: 5px 10px;
        }

        .subnavbar a:hover {
            background-color: #142157;
            border-radius: 5px;
        }

        /* Menú hamburguesa desplegado */
        .subnavbar.responsive {
            position: absolute;
            top: 50px;
            left: 0;
            width: 100%;
            background-color: #4a79ab;
            display: block;
            text-align: center;
        }

        /* Tabla de productos */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #757c8e;
            color: white;
        }

        /* Estilo del formulario de filtro */
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .search-bar {
            display: flex;
            gap: 10px;
        }

        .search-bar input[type="text"] {
            padding: 8px;
            width: 200px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .add-button button {
            background-color: #4a79ab;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .add-button button:hover {
            background-color: #273157;
        }

        /* Responsive design: Barra de hamburguesa */
        @media screen and (max-width: 768px) {
            .subnavbar {
                display: none;
                width: 100%;
                flex-direction: column;
            }

            .subnavbar.responsive {
                display: flex;
            }

            .menu-icon {
                display: block;
            }
        }
    </style>
</head>
<body>

    <!-- Barra de navegación principal -->
    <div class="navbar">
        <h1>FlowStock</h1>
        <div class="menu-icon" onclick="toggleMenu()">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- Subbarra de navegación -->
    <div class="subnavbar" id="submenu">
        <a href="#">Inventarios</a>
        <a href="#">Sucursales</a>
        <a href="#">Productos</a>
    </div>

    <!-- Contenido principal -->
    <div class="container">
        <!-- Barra de búsqueda y botón de agregar -->
        <div class="top-bar">
            <span style="font-family: 'Comic Sans MS', Arial, Verdana; font-size: 32px; font-weight: bold;">Productos</span>
            <div class="search-bar">
                <form method="GET" action="pantallaPrincipal.php">
                    <input type="text" name="search_name" placeholder="Buscar producto por nombre..." value="<?= htmlspecialchars($searchName) ?>">
                    <select name="category">
                        <option value="">Selecciona una categoría</option>
                        <?php foreach ($categorias as $categoria): ?>
                            <option value="<?= $categoria['id_categoria'] ?>" <?= $categoria['id_categoria'] == $categoryId ? 'selected' : '' ?>><?= htmlspecialchars($categoria['nombre_categoria']) ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" name="filter">Filtrar</button>
                </form>
            </div>
            <div class="add-button">
                <a href="agregarProducto.php"><button>+ Agregar Producto</button></a>
            </div>
        </div>

        <!-- Tabla de productos -->
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Categoría</th>
                <th>Fecha de Ingreso</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
            <?php mostrarProductos($productos); ?>
        </table>
    </div>

    <script>
        function toggleMenu() {
            var menu = document.getElementById('submenu');
            menu.classList.toggle('responsive');
        }
    </script>
</body>
</html>
