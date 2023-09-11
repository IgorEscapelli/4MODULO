<?php

session_start();
require_once 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE cpf = :cpf");
    $stmt->bindParam(':cpf', $cpf);
    $stmt->execute();
    $usuarios = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuarios && password_verify($senha, $usuarios['senha'])) {
        $_SESSION['user_id'] = $usuarios['id'];
        header("Location: dashboard.php");
    } else {
        echo "CPF ou senha incorretos.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro e Login de Usuários</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Cadastro de Usuário</h2>
            <form method="post" action="register.php">
                <input type="text" name="nome" placeholder="Nome" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="cpf" placeholder="CPF" required>
                <input type="date" name="data_nascimento" required>
                <input type="text" name="endereco" placeholder="Endereço" required>
                <input type="password" name="senha" placeholder="Senha" required>
                <button type="submit">Cadastrar</button>
            </form>
        </div>

     <!-- Formulario que envia para autentificar --> 
        <div class="form-container">
            <h2>Login</h2>
            <form method="post" action="autentificar.php">
                <input type="text" name="cpf" placeholder="CPF" required>
                <input type="password" name="senha" placeholder="Senha" required>
                <button type="submit" src="register.php" >Login</button>
            </form> 
        </div>

    <video controls>
        <source src="video/video/palmeiras.mp4" type="video/mp4">
    </video>
        
    </div>
</body>
</html>
