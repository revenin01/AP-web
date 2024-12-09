<?php
require_once 'db_config.php';

function obtenerUsuarios() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM empleados");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function obtenerUsuario($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM empleados WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function crearUsuario($nombre, $apellido, $puesto, $salario, $fecha_contratacion, $departamento) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO empleados (nombre, apellido, puesto, salario, fecha_contratacion, departamento) VALUES (?, ?, ?, ?, ?, ?)");
    return $stmt->execute([$nombre, $apellido, $puesto, $salario, $fecha_contratacion, $departamento]);
}

function actualizarUsuario($id, $nombre, $apellido, $puesto, $salario, $fecha_contratacion, $departamento) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE empleados SET nombre = ?, apellido = ?, puesto = ?, salario = ?, fecha_contratacion = ?, departamento = ? WHERE id = ?");
    return $stmt->execute([$nombre, $apellido, $puesto, $salario, $fecha_contratacion, $departamento, $id]);
}

function eliminarUsuario($id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM empleados WHERE id = ?");
    return $stmt->execute([$id]);
}
?>
