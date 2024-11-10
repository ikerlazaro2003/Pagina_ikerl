<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Proyectos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #007bff;
        }
        .navbar-brand {
            font-weight: bold;
        }
        .card {
            transition: transform .3s ease;
        }
        .card:hover {
            transform: scale(1.05);
        }
        footer {
            background-color: #343a40;
            color: white;
        }
    </style>
</head>
<body>

    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">Mis Proyectos <i class="fas fa-cogs"></i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="add_project.php">Añadir Proyecto</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="my-4 text-center text-primary">Mis Proyectos</h1>
        <div class="row">
            <?php
            // Conexión a la base de datos
            $conn = new mysqli('localhost', 'root', '', 'portfolio');

            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM projects";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='col-lg-4 col-md-6 mb-4'>";
                    echo "<div class='card shadow-sm'>";
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
                echo "<p class='text-center'>No hay proyectos disponibles.</p>";
            }

            $conn->close();
            ?>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer mt-5 py-3 text-center">
        <div class="container">
            <span>© 2023 Mis Proyectos | <a href="https://www.linkedin.com" target="_blank" class="text-white">LinkedIn</a> | <a href="https://github.com" target="_blank" class="text-white">GitHub</a></span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min
