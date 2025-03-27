<?php
require_once ("../config/conexion.php");
session_start();

// Verificar si los campos están definidos
if (!isset($_POST['email']) || !isset($_POST['password'])) {
    echo json_encode(['status' => 0, 'message' => 'Datos incompletos']);
    exit;
}

$email = $_POST['email'];
$contraseña = $_POST['password'];

// Preparar la consulta para evitar inyección SQL
$sql = "SELECT id, nombre, email, contraseña FROM clientes WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $cliente = $result->fetch_assoc();

    // Validar contraseña
    if (password_verify($contraseña, $cliente['contraseña'])) {
        $_SESSION['id'] = $cliente['id'];
        $_SESSION['nombre'] = $cliente['nombre'];

        echo json_encode(['status' => 1, 'message' => 'Inicio de sesión exitoso']);
    } else {
        echo json_encode(['status' => 2, 'message' => 'Contraseña incorrecta']);
    }
} else {
    echo json_encode(['status' => 3, 'message' => 'El correo no existe']);
}

$stmt->close();
$conn->close();
?>
