<?php
session_start(); // Inicia a sessão

// Verifica se o usuário está logado
if (!isset($_SESSION['nome_usuario'])) {
    // Usuário não está logado, redireciona para a página de login
    header('Location: ../../LOGIN/index.html');
    exit;
}

// Obtém os dados do usuário da sessão
$nomeUsuario = $_SESSION['nome_usuario'];

// Inicializa a variável de sucesso
$successMessage = '';

// Conectar ao banco de dados
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "nequa01";

$conexao = new mysqli($host, $usuario, $senha, $banco);
if ($conexao->connect_error) {
    die("Falha ao conectar ao banco de dados: " . $conexao->connect_error);
}

// Consultar o e-mail e nome do usuário no banco de dados
// Consultar o e-mail, nome e redes sociais do usuário no banco de dados
$sql = "SELECT email, nome, instagram, twitter, linkedin, biografia FROM nequa_cadastrop WHERE nome = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("s", $nomeUsuario);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();
    $emailUsuario = $row['email'];
    $nomeUsuario = $row['nome'];
    $instagramUsuario = $row['instagram'];
    $twitterUsuario = $row['twitter'];
    $linkedinUsuario = $row['linkedin'];
    $biografiaUsuario = $row['biografia'];
} else {
    // E-mail do usuário não encontrado no banco de dados
    // Você pode redirecionar o usuário ou executar outra ação adequada.
    echo "E-mail do usuário não encontrado.";
    exit; // Encerre a execução ou redirecione o usuário, se preferir.
}

$stmt->close();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Atualiza o e-mail do usuário
    $novoEmail = $_POST['changeEmail'];
    $sqlUpdateEmail = "UPDATE nequa_cadastrop SET email = ? WHERE nome = ?";
    $stmtUpdateEmail = $conexao->prepare($sqlUpdateEmail);
    $stmtUpdateEmail->bind_param("ss", $novoEmail, $nomeUsuario);

    if ($stmtUpdateEmail->execute()) {
        $successMessage = 'E-mail atualizado com sucesso!';
        $emailUsuario = $novoEmail;
    } else {
        $successMessage = 'Erro ao atualizar o e-mail: ' . $stmtUpdateEmail->error;
    }

    $stmtUpdateEmail->close();

    // Atualiza o nome do usuário
    $novoNome = $_POST['changeName'];
    $sqlUpdateNome = "UPDATE nequa_cadastrop SET nome = ? WHERE nome = ?";
    $stmtUpdateNome = $conexao->prepare($sqlUpdateNome);
    $stmtUpdateNome->bind_param("ss", $novoNome, $nomeUsuario);

    if ($stmtUpdateNome->execute()) {
        $successMessage = 'Nome atualizado com sucesso!';
        $nomeUsuario = $novoNome;
    } else {
        $successMessage = 'Erro ao atualizar o nome: ' . $stmtUpdateNome->error;
    }

    $stmtUpdateNome->close();

    // Atualiza o Instagram
    $novoInstagram = $_POST['instagram'];
    $sqlUpdateInstagram = "UPDATE nequa_cadastrop SET instagram = ? WHERE nome = ?";
    $stmtUpdateInstagram = $conexao->prepare($sqlUpdateInstagram);
    $stmtUpdateInstagram->bind_param("ss", $novoInstagram, $nomeUsuario);

    if ($stmtUpdateInstagram->execute()) {
        $successMessage = 'Instagram atualizado com sucesso!';
        $instagramUsuario = $novoInstagram;
    } else {
        $successMessage = 'Erro ao atualizar o Instagram: ' . $stmtUpdateInstagram->error;
    }

    $stmtUpdateInstagram->close();

    // Atualiza o Twitter
    $novoTwitter = $_POST['twitter'];
    $sqlUpdateTwitter = "UPDATE nequa_cadastrop SET twitter = ? WHERE nome = ?";
    $stmtUpdateTwitter = $conexao->prepare($sqlUpdateTwitter);
    $stmtUpdateTwitter->bind_param("ss", $novoTwitter, $nomeUsuario);

    if ($stmtUpdateTwitter->execute()) {
        $successMessage = 'Twitter atualizado com sucesso!';
        $twitterUsuario = $novoTwitter;
    } else {
        $successMessage = 'Erro ao atualizar o Twitter: ' . $stmtUpdateTwitter->error;
    }

    $stmtUpdateTwitter->close();

    // Atualiza o Linkedin
    $novoLinkedin = $_POST['linkedin'];
    $sqlUpdateLinkedin = "UPDATE nequa_cadastrop SET linkedin = ? WHERE nome = ?";
    $stmtUpdateLinkedin = $conexao->prepare($sqlUpdateLinkedin);
    $stmtUpdateLinkedin->bind_param("ss", $novoLinkedin, $nomeUsuario);

    if ($stmtUpdateLinkedin->execute()) {
        $successMessage = 'Linkedin atualizado com sucesso!';
        $linkedinUsuario = $novoLinkedin;
    } else {
        $successMessage = 'Erro ao atualizar o Linkedin: ' . $stmtUpdateLinkedin->error;
    }

    $stmtUpdateLinkedin->close();

    // Atualiza a biografia do usuário
    $novaBiografia = isset($_POST['biografia']) ? $_POST['biografia'] : '';
    $sqlUpdateBiografia = "UPDATE nequa_cadastrop SET biografia = ? WHERE nome = ?";
    $stmtUpdateBiografia = $conexao->prepare($sqlUpdateBiografia);
    $stmtUpdateBiografia->bind_param("ss", $novaBiografia, $nomeUsuario);

    if ($stmtUpdateBiografia->execute()) {
        $successMessage = 'Biografia atualizada com sucesso!';
        $biografiaUsuario = $novaBiografia;
    } else {
        $successMessage = 'Erro ao atualizar a biografia: ' . $stmtUpdateBiografia->error;
    }

    $stmtUpdateBiografia->close();

    $conexao->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet" href="index.css">
    <script src="app.js"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>
<body>
<!--
    <header>
        <div class="logo-container">
            <img src="" class="logo" alt="Logo">
        </div>

        <div class="flex-header-elements">
            <a href="">TESTE 1</a>
            <a href="">TESTE 2</a>
            <a href="">TESTE 3</a>
            <a href="">TESTE 4</a>
        </div>
    </header>
-->
    <main>
        <div class="banner-background">
            <input type="file" name="banner" id="banner">
        </div>
        
        <div class="profile-header">
            <input type="file" id="changeProfilePic">
        </div>
        

        <div class="information">
            <h3><?php echo $nomeUsuario; ?></h3>
            <h4><?php echo $emailUsuario; ?></h4>
        </div>

        <a href="#popup">Adicione áreas de atuação</a>

        <a href="../paginaprincipal.php"></a>

        <div class="buttons-profile-templates">
            <button class="profile" id="profile" onclick="changeContent(1)">Perfil</button>
            <button class="templates" id="templates" onclick="changeContent(2)">Templates</button>
        </div>

    </main>

    <main class="content" id="content">
        <div id="profile-content" class="profile-content">
            <div class="card-profile">
                <h2 class="about-username">Sobre <span class="userName"><?php echo $nomeUsuario; ?></span></h2>
                <hr width="80%" color="lightgray">

                <div class="change-profile-information">
                <form action="" method="post">
                        <div class="flex-social-content">
                          <label for="changeUsername">Usuário:</label>
                          <input type="text" id="changeUsername" name="changeEmail" value="<?php echo $emailUsuario; ?>" placeholder="" maxlength="30">
                        </div>
                        <div class="flex-social-content">
                          <label for="changeName">Nome:</label>
                          <input type="text" id="changeName" name="changeName" value="<?php echo $nomeUsuario; ?>" maxlength="80"><br><br>
                        </div>
                        <div class="social-media">
                            <h4>Redes Sociais</h4>

                            <div class="flex-social-content">
                                <label for="instagram">Instagram</label>
                                <input type="url" id="instagram" name="instagram" value="<?php echo $instagramUsuario; ?>">
                            </div>
                            
                            <div class="flex-social-content">
                                <label for="twitter">Twitter</label>
                                <input type="url" id="twitter" name="twitter" value="<?php echo $twitterUsuario; ?>">
                            </div>
                            
                            <div class="flex-social-content">
                                <label for="linkedin">Linkedin</label>
                                <input type="url" id="linkedin" name="linkedin" value="<?php echo $linkedinUsuario; ?>">
                            </div>

                        </div><br>
                        <label for="">Biografia:</label><br>
                        <textarea name="biografia" id="biografia" cols="30" rows="10"><?php echo $biografiaUsuario; ?></textarea><br><br>
                        <button class="botao-salvar" type="submit">Salvar</button>
                    </form>
                </div>
            </div> 
        </div>

        <div id="template-content" class="template-content">
    <button class="create" id="open-popup">Criar</button>

    <div class="popup-overlay" id="popupSaveArchive">
        <div class="popup-content">
            <button class="popup-close" id="close-popup">&times;</button>
            <h2>Novo Template</h2>
            <form class="popup-form" action="salvar_template.php" method="post" enctype="multipart/form-data">

                <label for="titulo">Título:</label>
                <input type="text" name="titulo" id="titulo" required>

                <label for="descricao">Descrição:</label>
                <textarea name="descricao" id="descricao" rows="4" required></textarea>

                <label for="arquivo">Arquivo:</label>
                <input type="file" name="arquivo" id="arquivo">

                <span id="file-name"></span><br><br>

                <button type="submit">Salvar</button>
            </form>
        </div>
    </div>

    <div class="templates">
        <?php include "buscar_templates.php"; ?>
    </div>

</div>

        <div class="nada"></div>
    </main>


    <div id="popup" class="overlay">
        <div class="popup">
          <h4 id="TESTE"></h4>
          <a class="close" href="#POPUP-HOVER">&times;</a>
          <div class="content1">
            <h3>Front-End</h3>
                <button class="sections">Figma</button>
                <button class="sections">HTML</button>
                <button class="sections">CSS</button>
                <button class="sections">JS</button>
                <hr>
            <h3>Frameworks</h3>
            <button class="sections">Bootstrap</button>
            <button class="sections">Tailwind</button>
            <button class="sections">React</button>
            <button class="sections">Vue</button>
          </div>
        </div>
      </div>
</body>
</html>