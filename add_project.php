<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Proyecto</title>
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
        .btn-custom {
            background-color: #28a745;
            color: white;
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
        <h1 class="my-4 text-center text-primary">Añadir Nuevo Proyecto</h1>

        <!-- Mensajes de éxito o error -->
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $image_url = $_POST['image_url'];
            $link = $_POST['link'];

            // Conexión a la base de datos
            $conn = new mysqli('localhost', 'root', '', 'portfolio');

            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            $sql = "INSERT INTO projects (title, description, image_url, link) VALUES ('$title', '$description', '$image_url', '$link')";
            
            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert alert-success text-center'>¡Nuevo proyecto añadido con éxito!</div>";
            } else {
                echo "<div class='alert alert-danger text-center'>Error: " . $conn->error . "</div>";
            }

            $conn->close();
        }
        ?>

        <!-- Formulario para añadir proyectos -->
        <form action="add_project.php" method="POST">
            <div class="form-group mb-4">
                <label for="title">Título del Proyecto</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group mb-4">
                <label for="description">Descripción</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>
            <div class="form-group mb-4">
                <label for="image_url">URL de la Imagen</label>
                <input type="text" class="form-control" id="image_url" name="image_url" required>
            </div>
            <div class="form-group mb-4">
                <label for="link">Enlace del Proyecto</label>
                <input type="url" class="form-control" id="link" name="link" required>
            </div>
            <button type="submit" class="btn btn-custom btn-block">Añadir Proyecto</button>
        </form>
    </div>

    <!-- Footer -->
    <footer class="footer mt-5 py-3 text-center">
        <div class="container">
            <span>© 2023 Mis Proyectos | <a href="https://www.linkedin.com" target="_blank" class="text-white">LinkedIn</a> | <a href="https://github.com" target="_blank" class="text-white">GitHub</a></span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>
</body>
</html>

