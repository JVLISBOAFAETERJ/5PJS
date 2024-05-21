<?php
$servername = "localhost";
$username = "root";
$password = "";  // Normalmente a senha é vazia no XAMPP por padrão
$dbname = "crud_system";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
