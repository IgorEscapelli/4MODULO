<?php
$host = "localhost"; // Host do MySQL
$db_name = "user_management"; // Nome do banco de dados
$username = "root"; // Seu nome de usuário do MySQL
$password = ""; // Sua senha do MySQL

// Conectando ao banco de dados
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>
