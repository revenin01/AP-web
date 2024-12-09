<?php
require_once 'includes/fuciones.php';
$usuarios = obtenerUsuarios();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Control de Personal</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Control de Personal</h1>
    <a href="crear.php">Nuevo Usuario</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Puesto</th>
                <th>Salario</th>
                <th>Fecha de Contratación</th>
                <th>Departamento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?php echo htmlspecialchars($usuario['id']); ?></td>
                <td><?php echo htmlspecialchars($usuario['nombre']); ?></td>
                <td><?php echo htmlspecialchars($usuario['apellido']); ?></td>
                <td><?php echo htmlspecialchars($usuario['puesto']); ?></td>
                <td><?php echo htmlspecialchars($usuario['salario']); ?></td>
                <td><?php echo htmlspecialchars($usuario['fecha_contratacion']); ?></td>
                <td><?php echo htmlspecialchars($usuario['departamento']); ?></td>
                <td>
                    <a href="editar.php?id=<?php echo $usuario['id']; ?>">Editar</a>
                    <a href="eliminar.php?id=<?php echo $usuario['id']; ?>" onclick="return confirm('¿Está seguro?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
