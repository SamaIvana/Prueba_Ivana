<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Curso</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <div class="contenedor">

        <?php
        // Incluir conexión a la base de datos
        include 'conexion.php';

        // Verificar si se recibe el ID del curso
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = (int) $_GET['id'];

            // Consultar detalles del curso
            $sql = "SELECT * FROM cursos WHERE id = ?";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $curso = $result->fetch_assoc();

                // Mostrar detalles del curso
                echo "<div class='item-detalles'>";
                echo "<h1>" . htmlspecialchars($curso['nombre']) . "</h1>";
                echo "<p>Descripción: " . htmlspecialchars($curso['descripcion']) . "</p>";
                echo "<p>Precio: $" . htmlspecialchars($curso['precio']) . "</p>";
                echo "</div>";
            } else {
                echo "<p>Curso no encontrado.</p>";
            }

            $stmt->close();
        } else {
            echo "<p>ID del curso no válido.</p>";
        }
        ?>

        <!-- Enlaces de navegación -->
        <a href="index.php"><button>Regresar al Inicio</button></a>
        <?php if (isset($id)) { ?>
            <a href="inscripcion.php?curso_id=<?php echo $id; ?>"><button>Inscribirse al Curso</button></a>
        <?php } ?>
    </div>
</body>
</html>
