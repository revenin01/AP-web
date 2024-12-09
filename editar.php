<?php
require_once 'includes/fuciones.php';

$id = $_GET['id'] ?? null;
$usuario = obtenerUsuario($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
<head>
    <meta charset="UTF-8">
    <title>Crear Usuario</title>
     <link rel="stylesheet" href="css/style.css">
</head>
    <h1>Editar Usuario</h1>
    <?php if (!empty($error)) echo "<p style='color: red;'>$error</p>"; ?>
<form method="POST">
<label>Nombre: <input type="text" name="nombre"></label><br>
        <label>Apellido: <input type="text" name="apellido"></label><br>
        <label>Puesto: <input type="text" name="puesto"></label><br>
        <label>Salario: <input type="number" step="0.01" name="salario"></label><br>
        <label>Fecha de Contratación: <input type="date" name="fecha_contratacion"></label><br>
        <label>Departamento: <input type="text" name="departamento"></label><br>
        <button type="submit">Editar</button>
</form>
