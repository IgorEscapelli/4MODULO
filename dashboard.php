<?php
session_start();

if (!isset($_SESSION['usuarios_id'])) {
    header("Location: login.php");
    exit;
}

// Resto da lógica da página do painel do usuário
?>