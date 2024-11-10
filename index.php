<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Proyectos</title>
    <link rel="stylesheet" href="path/to/bootstrap.min.css">
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Mis Proyectos</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="add_project.php">Añadir Proyecto</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1 class="my-4">Proyectos</h1>
        <div class="row">
            <?php
            // Conexión a la base de datos
            $conn = new mysqli('localhost', 'username', 'password', 'portfolio');

            // Verificar conexión
            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            // Consulta de los proyectos
            $sql = "SELECT * FROM projects";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Mostrar cada proyecto en una tarjeta
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='col-lg-4 col-md-6 mb-4'>";
                    echo "<div class='card'>";
                    echo "<img src='" . $row["image_url"] . "' class='card-img-top' alt='Imagen del proyecto'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>" . $row["title"] . "</h5>";
                    echo "<p class='card-text'>" . $row["description"] . "</p>";
                    echo "<a href='" . $row["link"] . "' class='btn btn-primary'>Ver Proyecto</a>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p>No hay proyectos disponibles.</p>";
            }

            // Cerrar conexión
            $conn->close();
            ?>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer mt-auto py-3 bg-light">
        <div class="container text-center">
            <span class="text-muted">© 2023 Mis Proyectos</span>
        </div>
    </footer>

    <script src="path/to/jquery.min.js"></script>
    <script src="path/to/bootstrap.bundle.min.js"></script>
</body>
</html>
