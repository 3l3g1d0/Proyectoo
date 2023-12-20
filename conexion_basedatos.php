<?php
$servername = "sql208.infinityfree.com";
$username = "if0_35033314";
$password = "fyr2jILbVGJE443";
$dbname = "if0_35033314_relacional";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Procesar datos del formulario y realizar la inserción en la base de datos
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$nickname = $_POST['nickname'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$codigo_postal = $_POST['codigo_postal'];
$correo_electronico = $_POST['correo_electronico'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

// Consulta preparada
$sql = $conn->prepare("INSERT INTO Usuarios (nombre, apellidos, nickname, telefono, direccion, codigo_postal, correo_electronico, fecha_nacimiento, contrasena) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$sql->bind_param("sssssssss", $nombre, $apellidos, $nickname, $telefono, $direccion, $codigo_postal, $correo_electronico, $fecha_nacimiento, $contrasena);

// Ejecutar la consulta
if ($sql->execute()) {
    echo "Registro exitoso";
} else {
    echo "Error: " . $sql->error;
}

$sql->close();
$conn->close();
?>
