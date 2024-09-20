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
    <div class="page_produit">

        
<div class="description">
<div class="options">
<ul>
<li data-content="Voici la description du produit.">DESCRIPTION</li>
<li data-content="Vous pouvez payer un acompte de 30% pour réserver ce produit.">ACOMPTE</li>
<li data-content="Vous avez la possibilité de fournir votre propre console pour la modification.">FOURNIR UNE CONSOLE</li>
<li data-content="Le délai d'expédition est estimé à 5-7 jours ouvrables.">DÉLAI ET EXPEDITION</li>
<li data-content="Nous offrons une garantie de 2 ans sur ce produit.">GARANTIE</li>
</ul>
</div>

<div class="paragraph">
<p></p> 
</div>
</div>
<div class="produit">


    
    <Article></Article>




</div>

<div class="mode_emploi">
    <div class="titre text-center mb-4">
      <h1>MODE D'EMPLOI</h1>
    </div>
    
    <!-- Utilisation de la grille Bootstrap -->
    <div class="row etapes">
      <!-- Étape 1 -->
      <div class="col-lg-6 col-md-6 col-sm-12 mb-4"  >
        <div class="etape bg-dark text-white p-4 rounded" >
          <h2 class="text-center">COULEUR DE L'ECRAN</h2>
          <img src="../assets/gb1.png" class="img-fluid mx-auto d-block mb-3 " alt="Etape 1" >
          <p>Pour ouvrir le mode couleurs, il suffit de rester appuyé sur la molette contraste et ensuite haut ou bas pour faire défiler les modes de couleurs. Il existe actuellement 8 modes de couleurs sur la console.</p>
        </div>
      </div>
      
      <!-- Étape 2 -->
      <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
        <div class="etape bg-dark text-white p-4 rounded">
          <h2 class="text-center">RÉGLER LA LUMINOSITÉ DE L'ÉCRAN</h2>
          <img src="../assets/gb2.png" class="img-fluid mx-auto d-block mb-3 " style="width: 45.5%;" alt="Etape 2">
          <p>Il est possible d’ajuster la luminosité de la console en utilisant la molette de contraste vers le bas ou le haut pour ajuster la luminosité.</p>
        </div>
      </div>
      
      <!-- Étape 3 -->
      <div class="col-12">
        <div class="etape bg-dark text-white p-4 rounded">
          <h2 class="text-center">BATTERIE RECHARGEABLE USB-C</h2>
          <img src="../assets/gb3.png" class="img-fluid mx-auto d-block mb-3"  alt="Etape 3">
          <p>La batterie a une capacité de 2300mAh. Utilisez uniquement le câble de charge fourni avec la console. Ne dépassez pas 5W avec le dock de charge et évitez les docks de charge rapide. L’autonomie est de 8 à 10 heures, et il est possible de jouer tout en étant branché.</p>
        </div>
      </div>
    </div>
  </div>


</div>
  </template>
  
  <script>
  
 
import Article from './Article.vue'

export default {
    name: "GameboyBanner",
  name: 'Produit',
  components: {
    Article, // Déclaration du composant
  },

  mounted() {
    // Sélectionner tous les éléments <li> une fois que le composant est monté
    const options = document.querySelectorAll('.options li');
    
    // Sélectionner le paragraphe
    const paragraph = document.querySelector('.paragraph p');
    
    // Ajouter un événement de clic à chaque élément <li>
    options.forEach(option => {
      option.addEventListener('click', function() {
        // Récupérer la valeur de l'attribut data-content
        const content = this.getAttribute('data-content');
        
        // Modifier le texte du paragraphe
        paragraph.textContent = content;
        
        // Gérer la classe active pour le style
        options.forEach(opt => opt.classList.remove('active'));
        this.classList.add('active');
      });
    });
  }
};
  </script>
  
  <style scoped>
  .page_produit {
    
   background-color: #1B015C;
    background-position: center;
    min-height: 100vh; /* Ajuste la hauteur min selon le contenu */
   
}
.titre{
    color: #ffffff;
    border-radius: 40px;
    text-align: center;
    margin-bottom: 20px;
    min-width: calc(30%);
    max-height: fit-content;
}

.mode_emploi {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
}

.titre h1, .titre h2 {
  font-family: "Bayon", system-ui;
}

.etape h2 {
    font-family: "Bayon", system-ui;
}

.etape p {
  font-family: "Bayon", sans-serif;
}

.img-fluid {
  max-width: 60%;
  /* Limite la taille des images */
}

.bg-dark {
  background: rgba(0, 0, 0, 0.7); /* Ajoute un fond semi-transparent */
}

/* Ajustement des marges pour petits écrans */
@media (max-width: 768px) {
  .img-fluid {
    max-width: 80%;
  }
  
  .etape {
    padding: 10px;
  }
}
/**PARTIE DESCRIPTION */
/* Style du conteneur description */
.description {
  max-width: 900px;
  margin: 0 auto;
  border-radius: 15px;
  padding: 20px;
}

/* Style des options (onglets) */
.options ul {
  list-style-type: none;
  padding: 0;
  display: flex;
  justify-content: space-between;
  margin-bottom: 20px;
  border-radius: 10px;
  overflow: hidden;
}

/* Style pour chaque onglet */
.options li {
  cursor: pointer;
  padding: 15px;
  flex: 1;
  text-align: center;
  font-family: "Bayon", sans-serif;
  background: rgba(0, 0, 0, 0.7); /* Fond pour contraster avec l'arrière-plan */
  color: #f9f5f5;
  transition: all ease-in-out 0.3s ;
  border-bottom: 2px solid transparent;

}

/* État de survol */
.options li:hover {
    transition: all ease-in-out 0.3s ;

    border-bottom: 2px solid #f90aad;
}

/* Onglet actif */
.options li.active {
    background-color: #f90aad;
    border-bottom: 2px solid #000000;


  /* Couleur d'accentuation pour l'onglet actif */
  color: #fff;
}

/* Style du paragraphe (contenu des onglets) */
.paragraph p {
  font-size: 1em;
  color: #ffffff;
  
  
}

/* Responsive: ajustement pour les petits écrans */
@media (max-width: 768px) {
  .options ul {
    flex-direction: column;
  }

  .options li {
    text-align: left;
  }
}

@media (max-width: 768px) {
    .etapes {
        grid-template-columns: 1fr; /* Une seule colonne pour les petits écrans */
    }

    .etape3 {
        grid-column: span 1; /* Étape 3 revient à une seule colonne */
    }
}

  /* Bannière avec image en arrière-plan */
  .gameboy-banner {
    background: 
    linear-gradient(to top, #1B015C, rgba(0, 0, 255, 0) 3%), /* Dégradé du bas vers le haut */
    url('@/assets/F8.png');
    background-size: cover; /* L'image doit rester entière */
    background-repeat: no-repeat; /* Évite la répétition de l'image si elle est plus petite */
    background-position: center; /* Centrer l'image dans la bannière */
    height: 60vh;
    position: relative; /* Pour positionner le texte par rapport à la bannière */
  }
  
  /* Positionnement du texte en bas à gauche */
  .text-section {
    position: absolute;
    bottom: 0; /* Le texte se place en bas */
    left: -8%; /* Le texte se place à gauche */
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
  