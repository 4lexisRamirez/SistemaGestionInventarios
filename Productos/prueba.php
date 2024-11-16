<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Hamburguesa</title>
    <style>
        /* Estilos básicos */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Barra de navegación */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            padding: 10px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
        }

        .navbar h1 {
            color: white;
            margin: 0;
            font-size: 1.5em;
        }

        /* Icono de hamburguesa */
        .menu-icon {
            display: flex;
            flex-direction: column;
            cursor: pointer;
            justify-content: space-around;
            align-items: center;
            height: 30px;
            width: 30px;
            background-color: transparent;
        }

        .menu-icon div {
            width: 25px;
            height: 3px;
            background-color: white;
            transition: 0.3s;
        }

        /* Menú desplegable */
        .menu {
            position: fixed;
            top: 0;
            left: -250px; /* Fuera de la pantalla al inicio */
            width: 250px;
            height: 100%;
            background-color: #333;
            transition: 0.3s;
            padding-top: 60px;
        }

        .menu a {
            text-decoration: none;
            color: white;
            padding: 15px;
            display: block;
            border-bottom: 1px solid #575757;
            font-size: 1.2em;
        }

        .menu a:hover {
            background-color: #575757;
        }

        .content {
            padding: 20px;
            margin-top: 70px;
            transition: margin-left 0.3s;
        }

        /* Media Queries */
        /* Ajuste para pantallas pequeñas */
        @media screen and (max-width: 768px) {
            .menu a {
                font-size: 1em;
                padding: 12px;
            }

            .menu-icon div {
                width: 30px;
            }

            .menu {
                width: 200px; /* Menú más estrecho en pantallas pequeñas */
            }
        }

        /* Ajustes para pantallas muy pequeñas (móviles) */
        @media screen and (max-width: 480px) {
            .navbar h1 {
                font-size: 1.2em; /* Ajuste de tamaño en pantallas móviles */
            }

            .menu {
                width: 180px; /* Menú aún más estrecho */
            }

            .menu a {
                font-size: 0.9em; /* Texto más pequeño */
                padding: 10px;
            }
        }
    </style>
</head>
<body>

    <!-- Barra de navegación -->
    <div class="navbar">
        <div class="menu-icon" onclick="toggleMenu()">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <h1>Mi Página</h1>
    </div>

    <!-- Menú desplegable -->
    <div id="menu" class="menu">
        <a href="#">Inicio</a>
        <a href="#">Servicios</a>
        <a href="#">Productos</a>
        <a href="#">Nosotros</a>
        <a href="#">Contacto</a>
    </div>

    <!-- Contenido principal -->
    <div class="content">
        <h2>Bienvenido a la Página</h2>
        <p>Haz clic en el icono de hamburguesa para ver las opciones del menú.</p>
    </div>

    <script>
        // Función para alternar el menú
        function toggleMenu() {
            var menu = document.getElementById("menu");
            var content = document.querySelector(".content");

            // Cambia la visibilidad del menú
            if (menu.style.left === "0px") {
                menu.style.left = "-250px"; // Oculta el menú
                content.style.marginLeft = "0"; // Ajusta el contenido
            } else {
                menu.style.left = "0"; // Muestra el menú
                content.style.marginLeft = "250px"; // Desplaza el contenido
            }
        }
    </script>

</body>
</html>
