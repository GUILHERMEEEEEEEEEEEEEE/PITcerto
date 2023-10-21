<?php
session_start(); // Inicia a sessão

// Verifica se o usuário está logado
if (!isset($_SESSION['nome_usuario'])) {
    // Usuário não está logado, redireciona para a página de login
    header('Location: LOGIN/index.html');
    exit;
}

// Obtém o nome de usuário da sessão
$nomeUsuario = $_SESSION['nome_usuario'];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Página Principal</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div class="container">
        <img src="IMAGES/nequa-removebg-preview (1).png" class="logo">
        <h1>Parabéns! Conta de <span><?php echo $nomeUsuario; ?></span> logou com sucesso.</h1>

        <a href="LOGIN/index.html">Ir para a tela de login</a> <br>
        <a href="CADASTRO/PESSOA/pessoa.html">Voltar para a tela de cadastro</a> <br>
        <a href="alterarsenha.php">Alterar senha</a>
        <a href="PAGINA-PERFIL/PAGINA-PERFIL/perfil.php">Tela de perfil</a>
        <a href="PAGINA-INICIO/index.php">Tela inicial</a>
    </div>
    
    <script src="main.js"></script>
</body>
</html>
