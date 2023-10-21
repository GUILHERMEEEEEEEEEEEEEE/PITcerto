function changeContent(content) {
    const templateContent = document.getElementById('template-content');
    const profileContent = document.getElementById('profile-content');    


    switch (content) {
      case 1:
        templateContent.style.display = "none";

        profileContent.style.display = "block";
        break;
      case 2:
        profileContent.style.display = "none";

        templateContent.style.display = "block";
        break;
      default:
        break;
    }
  }


  window.addEventListener('DOMContentLoaded', () => {
    const openPopupBtn = document.getElementById('open-popup');
    const popup = document.getElementById('popupSaveArchive');
    const closePopupBtn = document.getElementById('close-popup');

    openPopupBtn.addEventListener('click', () => {
        popup.style.display = 'flex';
    });

    closePopupBtn.addEventListener('click', () => {
        popup.style.display = 'none';
    });
    
    const fileInput = document.getElementById('arquivo');
    fileInput.addEventListener('change', () => {
        const fileName = fileInput.value.split('\\').pop();
        document.getElementById('file-name').textContent = fileName;
    });

    

    


  });




















  window.addEventListener('DOMContentLoaded', (event) => {
    const bannerInput = document.getElementById('banner');
  
    bannerInput.addEventListener('change', (event) => {
      const file = event.target.files[0];
      const reader = new FileReader();
  
      reader.onload = (e) => {
        const bannerBackground = document.querySelector('.banner-background');
        bannerBackground.style.backgroundImage = `url(${e.target.result})`;
      };
  
      reader.readAsDataURL(file);
    });
  });         
  
  window.addEventListener('DOMContentLoaded', (event) => {
    const profilePicInput = document.getElementById('changeProfilePic');
  
    profilePicInput.addEventListener('change', (event) => {
      const file = event.target.files[0];
      const reader = new FileReader();
  
      reader.onload = (e) => {
        const profileHeader = document.querySelector('.profile-header');
        profileHeader.style.backgroundImage = `url(${e.target.result})`;
      };
  
      reader.readAsDataURL(file);
    });
  });
  document.addEventListener("DOMContentLoaded", function() {
    var popup = document.getElementById("popup");
    var enviarButton = document.getElementById("enviar");
    var opcoesSelecionadas = document.getElementById("opcoes-selecionadas");
    var popupLink = document.getElementById("popup-link"); // Adiciona a referência ao link #popup-link
  
    popup.addEventListener("click", function(event) {
      event.stopPropagation(); // Impede que o clique no popup seja propagado para a tela inicial
    });
  
    enviarButton.addEventListener("click", function() {
      var checkboxes = popup.querySelectorAll('input[type="checkbox"]:checked');
      opcoesSelecionadas.innerHTML = ""; // Limpa a lista de opções selecionadas
  
      checkboxes.forEach(function(checkbox) {
        var li = document.createElement("li");
        li.innerHTML = checkbox.value;
        opcoesSelecionadas.appendChild(li);
      });
  
      popup.style.display = "none"; // Esconde o popup após enviar as opções
    });
  
    // Mostra o popup quando o usuário clica exatamente no link #popup-link
    popupLink.addEventListener("click", function(event) {
      event.preventDefault(); // Impede o comportamento padrão de redirecionamento do link
      popup.style.display = "block";
    });
  });
  window.addEventListener('DOMContentLoaded', (event) => {
    const bannerInput = document.getElementById('banner');
    const profilePicInput = document.getElementById('changeProfilePic');
    const bannerBackground = document.querySelector('.banner-background');
    const profileHeader = document.querySelector('.profile-header');
  
    // Verifica se há dados armazenados no LocalStorage para o banner
    const storedBanner = localStorage.getItem('banner');
    if (storedBanner) {
      bannerBackground.style.backgroundImage = storedBanner;
    }
  
    // Verifica se há dados armazenados no LocalStorage para a imagem de perfil
    const storedProfilePic = localStorage.getItem('profilePic');
    if (storedProfilePic) {
      profileHeader.style.backgroundImage = storedProfilePic;
    }
  
    bannerInput.addEventListener('change', (event) => {
      const file = event.target.files[0];
      const reader = new FileReader();
  
      reader.onload = (e) => {
        bannerBackground.style.backgroundImage = `url(${e.target.result})`;
  
        // Armazena os dados do banner no LocalStorage
        localStorage.setItem('banner', `url(${e.target.result})`);
      };
  
      reader.readAsDataURL(file);
    });
  
    profilePicInput.addEventListener('change', (event) => {
      const file = event.target.files[0];
      const reader = new FileReader();
  
      reader.onload = (e) => {
        profileHeader.style.backgroundImage = `url(${e.target.result})`;
  
        // Armazena os dados da imagem de perfil no LocalStorage
        localStorage.setItem('profilePic', `url(${e.target.result})`);
      };
  
      reader.readAsDataURL(file);
    });
  });