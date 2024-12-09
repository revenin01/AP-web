<?php
require_once 'includes/fuciones.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validar si los campos están definidos y no están vacíos
    $nombre = $_POST['nombre'] ?? '';
    $apellido = $_POST['apellido'] ?? '';
    $puesto = $_POST['puesto'] ?? '';
    $salario = $_POST['salario'] ?? '';
    $fecha_contratacion = $_POST['fecha_contratacion'] ?? '';
    $departamento = $_POST['departamento'] ?? '';

    if ($nombre && $apellido && $puesto && $salario && $fecha_contratacion && $departamento) {
        if (crearUsuario($nombre, $apellido, $puesto, $salario, $fecha_contratacion, $departamento)) {
            header('Location: index.php');
            exit;
        } else {
            $error = 'Error al crear el usuario.';
        }
    } else {
        $error = 'Por favor, completa todos los campos.';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Usuario</title>
     <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Crear Usuario</h1>
    <?php if (!empty($error)) echo "<p style='color: red;'>$error</p>"; ?>
    <form method="POST" action="">
        <label>Nombre: <input type="text" name="nombre"></label><br>
        <label>Apellido: <input type="text" name="apellido"></label><br>
        <label>Puesto: <input type="text" name="puesto"></label><br>
        <label>Salario: <input type="number" step="0.01" name="salario"></label><br>
        <label>Fecha de Contratación: <input type="date" name="fecha_contratacion"></label><br>
        <label>Departamento: <input type="text" name="departamento"></label><br>
        <button type="submit">Crear</button>
    </form>
</body>
</html>

