<?php
$servername = "localhost"; // O usa 127.0.0.1 si hay problemas con localhost
$username = "forge";
$password = "Q1u4492MKWhzcKKtZOOq";
$database = "impetum";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
echo "Conexión exitosa a la base de datos";
$conn->close();
?>
