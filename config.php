<?php
$dHost = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbdatabase = "formulariofortetrator";

// Estabelecer conexão com o banco de dados
$conn = new mysqli($dbHost,$dbusername,$dbpassword,$dbdatabase);

// Verificar conexão
if ($conn->connect_error) {
    die("Erro de conexão com o banco de dados: " . $conn->connect_error);
}
?>
