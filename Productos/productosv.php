<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlowStock</title>
    <style>
        /* Estilos básicos para la página */
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
        .navbar img {
            width: 30px;
            border-radius: 50%;
        }
        /* Subbarra de navegación */
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
        /* Estilos de la tabla de productos */
        .container {
            padding: 20px;
        }
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
        /* Estilos de los botones de acción */
        .actions {
            display: flex;
            gap: 10px;
            justify-content: center;
            font-size: 12px;
        }
        .actions span {
            cursor: pointer;
            color: #3498db;
            text-decoration: underline;
        }
        /* Estilo para el botón de agregar */
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }
        .search-bar {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .search-bar input[type="text"] {
            padding: 8px;
            width: 200px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .search-bar img {
            width: 20px;
            cursor: pointer;
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
    </style>
</head>
<body>

    <!-- Barra de navegación principal -->
    <div class="navbar">
        <h1>FlowStock</h1>
        <img src="https://via.placeholder.com/30" alt="Perfil">
    </div>

    <!-- Subbarra de navegación con opciones -->
    <div class="subnavbar">
        <a href="#">Inventarios</a>
        <a href="#">Sucursales</a>
        <a href="#">Productos</a>
    </div>

<!-- Contenido principal -->
<div class="container">
    <!-- Barra de búsqueda y botón de agregar producto en la misma línea -->
    <div class="top-bar" style="margin-top: 1px;"> <!-- Ajusta el margen inferior -->
        <span style="font-family: 'Comic Sans MS', Arial, Verdana; font-size: 32px; font-weight: bold;">Productos</span>
        <div class="search-bar" style="margin-right: 10px;"> <!-- Ajusta el margen derecho -->
            <input type="text" placeholder="Buscar producto...">
            <img src="https://via.placeholder.com/20" alt="Filtrar" title="Filtrar">
        </div>
        <div class="add-button">
            <button>+ Agregar Producto</button>
        </div>
    </div>
    
    <!-- Tabla de productos -->
    <table style="margin-top: 7px;"> <!-- Ajusta el margen superior de la tabla -->
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
        <tr>
            <td>1</td>
            <td>Bose SoundLink</td>
            <td>Bocina portátil</td>
            <td>BOSE</td>
            <td>Mini II</td>
            <td>Bocinas</td>
            <td>12-02-2024</td>
            <td>56</td>
            <td class="actions">
                <span>Editar</span> | <span>Eliminar</span>
            </td>
        </tr>
        <!-- Más filas de productos pueden ir aquí -->
    </table>
</div>

</body>
</html>
