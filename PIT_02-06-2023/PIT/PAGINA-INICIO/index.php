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
<title>Nequa - Página Inicial</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="index.css">
</head>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-wide w3-padding w3-card">
    <a href="#home" class="w3-bar-item w3-button"><b>Nequa</b></a>
    <!-- Float links to the right. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
      <a class="usuario w3-bar-item"><?php echo $nomeUsuario; ?> -</a>
      <a href="../PAGINA-PERFIL/PAGINA-PERFIL/perfil.php" class="w3-bar-item w3-button">Perfil</a>
      <a href="#about" class="w3-bar-item w3-button">Sobre</a>
      <a href="#contact" class="w3-bar-item w3-button">Contato</a>
    </div>
  </div>
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
  <img class="w3-image" src="https://epicode.com/wp-content/uploads/2022/08/html-e-css-1.jpg" alt="Architecture" width="1500" height="800">
  <div class="w3-display-middle w3-margin-top w3-center">
    <h1 class="w3-xxlarge w3-text-white"><span class="w3-padding w3-black w3-opacity-min"><b>Nequa</b></span> <span class="w3-hide-small w3-text-light-grey"></span></h1>
  </div>
</header>

<!-- Page content -->
<div class="w3-content w3-padding" style="max-width:1564px">

  <!-- Project Section -->
  <div class="w3-container w3-padding-32" id="projects">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Projects</h3>
  </div>

  <div class="w3-row-padding">
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-blue w3-padding">HTML</div>
        <img src="https://ggames.com.br/uploads/monthly_2019_04/carbon.png.40d0504459833c3baecc24bdebb794c3.png" alt="House" style="width:100%">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-blue w3-padding">HTML</div>
        <img src="https://jera.com.br/blog/wp-content/uploads/2020/11/Introdu%C3%A7%C3%A3o_HTML_CSS_10.png" alt="House" style="width:100%">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-blue w3-padding">HTML</div>
        <img src="https://i.stack.imgur.com/CS10U.png" alt="House" style="width:100%">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-blue w3-padding">HTML</div>
        <img src="https://miro.medium.com/v2/resize:fit:640/0*l55k1Z86dWHquIzE.gif" alt="House" style="width:100%">
      </div>
    </div>
  </div>
  <!-- About Section -->
  <div class="w3-container w3-padding-32" id="about">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Sobre</h3>
    <div>
      <div class="flexzinha-para">
        <img src="https://www.freecodecamp.org/portuguese/news/content/images/size/w2000/2022/01/html-examples.jpeg" class="img-about" />
        <p>
          Nequa é uma marca própria para o seu desenvolvimento e fixação dele.<br> Você pode aprimorar seus códigos junto a comunidade e vende-los para pessoas interessadas.<br> <br>
          Como empresa a Nequa prioriza a experiência do usuário e a sua performance enquanto ele pode ganhar por isso. A limitação é apenas a sua criatividade, há espaço para qualquer pessoa e nível de experiência.<br>
          <img src="nequa-removebg-preview.png" class="nequa-logo" />
          </p>
      <div/>
    </div>
  </div>

  <!-- Contact Section -->
  <div class="w3-container w3-padding-32" id="contact">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Contato</h3>
    <p>Entre em contato e lance seu primeiro projeto na plataforma.</p>
    <form action="/action_page.php" target="_blank">
      <input class="w3-input w3-border" type="text" placeholder="Name" required name="Nome">
      <input class="w3-input w3-section w3-border" type="text" placeholder="Email" required name="Email">
      <input class="w3-input w3-section w3-border" type="text" placeholder="Título" required name="Subject">
      <input class="w3-input w3-section w3-border" type="text" placeholder="Conteúdo" required name="Comment">
      <button class="w3-button w3-blue w3-section" type="submit">
        <i class="fa fa-paper-plane"></i> SEND MESSAGE
      </button>
    </form>
  </div>
  
<!-- Image of location/map -->
<div class="w3-container">
  <img src="https://www.w3schools.com/w3images/map.jpg" class="w3-image" style="width:100%">
</div>

<!-- End page content -->
</div>


<!-- Footer -->
<footer class="w3-center w3-blue w3-padding-16">
  <p>Powered by <a href=" nequa.com.br" title="W3.CSS" target="_blank" class="w3-hover-text-blue">nequa.com.br</a></p>
</footer>

</body>
</html>
