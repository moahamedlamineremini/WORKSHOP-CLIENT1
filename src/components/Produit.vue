<template>
    <div class="gameboy-banner">
      <div class="container h-100 position-relative">
        <!-- Texte en bas à gauche de l'image de fond -->
        <div class="text-section">
          <h1 class="gameboy-title">GAMEBOY DMG</h1>
          <p class="gameboy-price">À PARTIR DE 129€</p>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: "GameboyBanner",
  };
  </script>
  
  <style scoped>
  /* Bannière avec image en arrière-plan */
  .gameboy-banner {
    background-image: url('@/assets/F8.png'); /* Remplacer par l'image de fond */
    background-size: cover; /* L'image doit rester entière */
    background-repeat: no-repeat; /* Évite la répétition de l'image si elle est plus petite */
    background-position: center; /* Centrer l'image dans la bannière */
    height: 80vh;
    position: relative; /* Pour positionner le texte par rapport à la bannière */
  }
  
  /* Positionnement du texte en bas à gauche */
  .text-section {
    position: absolute;
    bottom: 0; /* Le texte se place en bas */
    left: -18%; /* Le texte se place à gauche */
    padding: 20px; /* Un peu de marge intérieure pour ne pas coller aux bords */
  }
  
  .gameboy-title {
    font-size: 10rem;
    font-family: "Bayon", sans-serif;
    font-weight: bold;
    background: linear-gradient(to left, #007CFF, #ffffff); /* Dégradé de droite (#007CFF) à gauche (blanc) */
  -webkit-background-clip: text; /* Le dégradé ne s'applique qu'au texte */
  -webkit-text-fill-color: transparent; /* Remplit le texte avec le dégradé */    text-transform: uppercase;
  }
  
  .gameboy-price {
    font-family: "Bayon", sans-serif;

    font-size: 3rem;
    color: #1B015C;
    background: linear-gradient(to left, #007CFF, #ffffff); /* Dégradé de droite (#007CFF) à gauche (blanc) */
  -webkit-background-clip: text; /* Le dégradé ne s'applique qu'au texte */
  -webkit-text-fill-color: transparent; /* Remplit le texte avec le dégradé */    text-transform: uppercase;  
}
  
  /* Ajustement responsif */
  @media (max-width: 500px) {
    .gameboy-title {
      font-size: 2.5rem;
    }
  
    .gameboy-price {
      font-size: 1rem;
    }
  
    .gameboy-banner {
        left: 0%;
        height: 15vh;
    }
    .text-section{
        position: absolute;
    bottom: -20%; /* Le texte se place en bas */
    left:0%; /* Le texte se place à gauche */
    padding: 20px; /* Un peu de marge intérieure pour ne pas coller aux bords */
    }
  }
  
  @media (min-width: 500px) and (max-width: 900px) {
    .gameboy-title {
      font-size: 3rem;
    }
  
    .gameboy-price {
      font-size: 1.2rem;
    }
  
    .gameboy-banner {
      height: 25vh;

    }
    .text-section {
    position: absolute;
    bottom: 0; /* Le texte se place en bas */
    left: 0; /* Le texte se place à gauche */
    padding: 20px; /* Un peu de marge intérieure pour ne pas coller aux bords */
  }
  }
  
  @media (min-width: 900px) and (max-width: 1510px) {
   
  
    .gameboy-banner {
      height: 75vh;

    }
    .text-section {
    position: absolute;
    bottom: 0; /* Le texte se place en bas */
    left: -5%; /* Le texte se place à gauche */
    padding: 20px; /* Un peu de marge intérieure pour ne pas coller aux bords */
  }
  
  }
  </style>
  