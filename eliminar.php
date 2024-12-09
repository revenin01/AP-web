<?php
require_once 'includes/fuciones.php';

$id = $_GET['id'] ?? null;
if ($id && eliminarUsuario($id)) {
    header('Location: index.php');
}
?>
