<?php
// Conectar ao banco de dados (substitua os valores pelos seus próprios)
$servername = "localhost";
$dbname = "user_management";
$username = "root";
$password = "";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Recuperar dados do formulário
$cpf = $_POST['cpf'];
$senha = $_POST['senha'];

// Consultar o banco de dados para verificar o CPF e a senha
$sql = "SELECT id FROM usuarios WHERE cpf = '$cpf' AND senha = '$senha'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Login bem-sucedido
    session_start();
    $_SESSION['cpf'] = $cpf;
    header("Location: dashboard.php"); // Redirecionar para a página do painel após o login
} else {
    // Login falhou
    echo "CPF ou senha incorretos. <a href='login.php'>Tente novamente</a>";
}

$conn->close();
?>
