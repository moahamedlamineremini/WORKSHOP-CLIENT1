
<script>
export default {
  name: "typeWiriter",
  data: () => {
    return {
      typeValue: "",
      typeStatus: false,
      displayTextArray: ["Revivez vos classiques améliorés !"],
      typingSpeed: 150,
      erasingSpeed: 100,
      newTextDelay: 2000,
      displayTextArrayIndex: 0,
      charIndex: 0,
    };
  },
  props: {},
  created() {
    setTimeout(this.typeText, this.newTextDelay + 200);
  },
  methods: {
    typeText() {
      if (this.charIndex < this.displayTextArray[this.displayTextArrayIndex].length) {
        if (!this.typeStatus) this.typeStatus = true;
        this.typeValue += this.displayTextArray[this.displayTextArrayIndex].charAt(
          this.charIndex
        );
        this.charIndex += 1;
        setTimeout(this.typeText, this.typingSpeed);
      } else {
        this.typeStatus = false;
        setTimeout(this.eraseText, this.newTextDelay);
      }
    },
    eraseText() {
      if (this.charIndex > 0) {
        if (!this.typeStatus) this.typeStatus = true;
        this.typeValue = this.displayTextArray[this.displayTextArrayIndex].substring(
          0,
          this.charIndex - 1
        );
        this.charIndex -= 1;
        setTimeout(this.eraseText, this.erasingSpeed);
      } else {
        this.typeStatus = false;
        this.displayTextArrayIndex += 1;
        if (this.displayTextArrayIndex >= this.displayTextArray.length)
          this.displayTextArrayIndex = 0;
        setTimeout(this.typeText, this.typingSpeed + 1000);
      }
    },
  },
};

  </script><template>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Bayon&display=swap" rel="stylesheet">
  <div class="acceuil_section">
    <section class="container text-center">
      <h1> RETROMETROID
        <br>
        <span class="typed-text">{{ typeValue }}</span>
        <span class="blinking-cursor">|</span>
        <span class="cursor" :class="{ typing: typeStatus }">&nbsp;</span>
      </h1>
    </section>
  </div>

  <!-- New Console Showcase Section (Carousel) -->
  <div class="console-section">
    <div id="consoleCarousel" class="carousel slide" data-bs-ride="carousel" >
      <!-- Carousel items -->
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="console-slide">
            
   <!-- Icône Hydra -->
<img src="../assets/hydra.png" alt="Hydra Icon" class="hydra-icon position-absolute " style="top: 69%; left: -0.5%; width: 20%;">

<!-- Icône Relic -->
<img src="../assets/relic.png" alt="Relic Icon" class="relic-icon position-absolute " style="top: -20%;right: -5%; width: 20%;">


            
            <p>De nouvelles possibilités</p>
            <h5>PS Vita</h5>
            <img src="../assets/PSVITA.png" class="d-block w-100" alt="PS Vita">
            <a href="#" class="discover-btn">DÉCOUVREZ</a>
          </div>
        </div>
        <div class="carousel-item">
          <div class="console-slide">
            
   <!-- Icône Hydra -->
<img src="../assets/beartrap.png" alt="Hydra Icon" class="hydra-icon position-absolute " style="top: 85%; left: -0.5%; width: 20%;">

<!-- Icône Relic -->
<img src="../assets/axe.png" alt="Relic Icon" class="relic-icon position-absolute " style="top: -2%;right: -0.5%; width: 20%;">
          
            <p>Explorez encore plus avec la nouvelle génération</p>
            <h5>NDS LITE</h5>
            <img src="../assets/NDS.png" class="d-block w-100" alt="Console 2">
            <a href="#" class="discover-btn">DÉCOUVREZ</a>
          </div>
        </div>
      </div>

      <!-- Controls for PC (left and right arrows) -->
      <button class="carousel-control-prev" type="button" data-bs-target="#consoleCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#consoleCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
      
    </div>
  </div>
  <section class="customisation container-fluid py-5">
  <div class="row justify-content-center">
    <div class="col-12 text-center mb-4">
      <h2>CUSTOMISATION</h2>
      <h3>Construit ta propre console</h3>
    </div>
    <div class="col-lg-6 col-md-8 col-12">
      <p class="customisation-text">
        Faites revivre les icônes des plus grands classiques des jeux retro gaming ! 
        Plongez dans l’âge d’or des jeux vidéo des années 70, 80, 90 et 2000. Retrouvez l’énergie de la nostalgie de vos parties légendaires ou découvrez des pépites du gaming qui vous avaient peut-être échappé à l’époque.
        Avec plus de 90 000 jeux intégrés à nos consoles rétro, des heures de jeu vous attendent auprès de vos héros préférés, que ce soit en solo ou en compagnie de vos proches, grâce aux modes multijoueurs.
      </p>
    </div>
    <div class="col-lg-4 col-md-6 col-12 d-flex justify-content-center">
      <img src="../assets/games.png" class="img-fluid" alt="Console retro gaming">
    </div>
  </div>
</section>
<section>
      <div class="console-cards">
      <div class="card card-1">
        <div class="card-content">
        <h3>LE PLUS GRAND ECRAN</h3>
        <h1>GAMEBOY COLOR</h1>
        <button class="">Personnaliser</button>
        </div>
        <img src="../assets/gameboy_bleu.png" alt="Gameboy Color Image 1">
        </div>
      <div class="card card-2">
        <div class="card-content">
        <h3>LA PLUS POLYVALENTE</h3>
        <h1>GAMEBOY ADVANCE</h1>
        <button>Personnaliser</button>
        </div>
        <img src="../assets/gameboy_vert.png" alt="Gameboy Color Image 1">
        </div>
      <div class="card card-3">
        <div class="card-content">
        <h3>LA PLUS PRATIQUE</h3>
        <h1>ADVANCE SP</h1>
        <button>Personnaliser</button>
        </div>
        <img src="../assets/advance_sp.png" alt="Gameboy Color Image 1">
        </div>
      <div class="card card-4">
        <div class="card-content">
        <h3>L'ORIGINALE</h3>
        <h1> GAMEBOY DMG</h1>
        <button>Personnaliser</button>
        </div>
        <img src="../assets/gameboy_gris.png" alt="Gameboy Color Image 1">
        </div>
        <section class="edition-limitees container-fluid">
  <div class="overlay d-flex justify-content-center align-items-center">
    <div class="text-center text-white">
      <h2 class="display-4 text-uppercase fw-bold">Édition Limitées</h2>
      <p class="lead">Créés pour être unique</p>
      <button class="btn-pink">Découvrez</button>
    </div>
  </div>
</section>
    </div>
    
    </section>
                      
                                                 
                                                              
</template>


<style>
.edition-limitees {

  background-image: url('../assets/retro_sunset.jpg');
  background-size: cover;
  background-position: center;
  display: flex;
  max-width: 85%;
  margin: 0 auto;
  justify-content: center;
  align-items: center;
  height: 400px;
  border-radius: 20px;
  overflow: hidden;
  position: relative;
  
}

.edition-limitees h2 {
  font-family: 'Press Start 2P', sans-serif;
  color: white;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
}

.edition-limitees p {
  font-family: 'Press Start 2P', sans-serif;
  color: #c0c0c0;
  text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.8);
}

.btn-pink {
  background-color: #ff0080;
  color: white;
  border-radius: 40px;
  padding: 10px 20px;
  border: 2px solid transparent;
  text-transform: uppercase;
  font-weight: bold;
  cursor: pointer;
  transition: all 0.3s ease;
}

.btn-pink:hover {
  background-color: #efcbdd;
  border-color: #3b002a;
  color: #ff0080;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  transform: scale(1.05);
}
/* Responsiveness */
@media (max-width: 768px) {
  .edition-limitees {
    height: 300px; /* Adjust height for smaller screens */
  }
  .edition-limitees h2 {
    font-size: 1.75rem; /* Adjust text size */
  }
  .edition-limitees p {
    font-size: 1rem; /* Adjust paragraph size */
  }
  .btn-pink {
    padding: 8px 16px; /* Smaller padding for smaller screens */
    font-size: 0.9rem;
  }
}

@media (max-width: 576px) {
  .edition-limitees {
    height: 250px; /* Smaller height for extra small screens */
  }
  .edition-limitees h2 {
    font-size: 1.5rem; /* Further adjust text size */
  }
  .edition-limitees p {
    font-size: 0.9rem;
  }
  .btn-pink {
    padding: 6px 12px;
    font-size: 0.8rem;
  }
}

.edition-limitees h2 {
  font-family: 'Press Start 2P', sans-serif;
  color: white;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
}

.edition-limitees p {
  font-family: 'Press Start 2P', sans-serif;
  color: #c0c0c0;
  text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.8);
}

.btn-pink {
  background-color: #ff0080;
  color: white;
  border-radius: 40px;
  padding: 10px 20px;
  border: 2px solid transparent;
  text-transform: uppercase;
  font-weight: bold;
  cursor: pointer;
  transition: all 0.3s ease;
}

.btn-pink:hover {
  background-color: #efcbdd;
  border-color: #3b002a;
  color: #ff0080;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  transform: scale(1.05);
}

.console-cards {
background: #16014A;
  display: flex;
  flex-wrap: wrap;
  flex-direction: row;
  justify-content: center;
  gap: 40px;
  padding: 20px;
}

.console-cards .card {
  border-radius: 20px;
  overflow: hidden;
  width: 480px; /* Largeur uniforme */
  min-height: 400px; /* Hauteur minimum */
  text-align: center;
  color: white;
  position: relative;
  display: flex;
  flex-direction: column;
  justify-content: space-between; /* Espace entre contenu et image */
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); /* Ombre pour effet de profondeur */
}
.console-cards .card-1 {

  background: linear-gradient(135deg, #172a74,#0d1b4d, #21a9e1); /* Bleu */
}

/* Dégradé pour la deuxième carte */
.console-cards .card-2 {
 
  background: linear-gradient(135deg, #ffdd00, #40bfdb)
}

/* Dégradé pour la troisième carte */
.console-cards .card-3 {
 background: linear-gradient(135deg, #ff512f,#70047c, #dd2476); /* Rouge-rose */}

/* Dégradé pour la quatrième carte */
.console-cards .card-4 {
  background: linear-gradient(135deg, #f7971e, #ff0000, #ffd200);}

.console-cards .card h3, .console-cards .card h1 {
  font-family: "Bayon", sans-serif;
}

.console-cards .card h3 {
  font-size: 2.1rem;
  margin-bottom: 0.5rem;
  margin-top: 3rem;
}

.console-cards .card h1 {
  font-size: 4rem; /* Taille du texte plus grande */
  margin-bottom: 2rem;

}

.console-cards .card img {
  width: 100%;
  height: auto;
  display: block;
  align-self: flex-end; /* Assure que l'image est en bas de la carte */
  margin-top: auto;
}

.console-cards .card-content {
  padding: 20px;
}

.console-cards button:not(.btn-pink) {
  background-color: #1B015C;
  width: 8rem;
  height: 2.5rem;
  border: 2px solid transparent;
  border-radius: 30px;
  font-weight: 600;
  transition: all ease 0.3s;
  color: #fff;
  margin-bottom: 2rem; /* Ajoute un espace sous le bouton */
}

.console-cards button:hover {
  color: #1B015C;
  border: 2px solid #1B015C;
  background-color: #f5f5f5;
}

/* Styling for the console showcase */
/* Styling for the console showcase */
/* Ensure the console-section is positioned relative */

.customisation{
  background-color: #16014A;
  color: #FFFFFF;
}
  .customisation h2 {
    font-family:"Press Start 2P", system-ui;
    color: #951B81;
  }
  .customisation-text {
    font-family:"Press Start 2P", system-ui;
  }
  @media (max-width: 768px) {
  .customisation h2 {
    font-size: 1.5rem;
  }

  .customisation h3 {
    font-size: 1.2rem;
  }

  .customisation-text {
    font-size: 0.7rem;
    
  }
}
.console-section {
  position: relative;
  /* Existing styling... */
}

.console-section {
  min-height: 80vh;
  background-color: #16014A;
  background-size: cover;
  background-position: center;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 50px 0;
  
}

.console-slide {
  background-color: white; /* White background for each console slide */
  padding: 20px;
  position: relative;
  border-radius: 10px;
  text-align: center;
  width: 100%;
  margin: 100px;

}

.console-slide h5 {
  font-size: 10rem;
  font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
  color: #000;
}

.console-slide p {
  font-size: 1rem;
  color: #555;
}

.console-slide img {
  max-height: 300px;
  object-fit: contain;
  
}

.discover-btn {
  display: inline-block;
  padding: 10px 20px;
  background-color: #1B015C;
  color: white;
  font-size: 1rem;
  text-transform: uppercase;
  border-radius: 20px;
  text-decoration: none;
  font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
}

.discover-btn:hover {
  box-shadow:#EC32B5 ;
}
@media (min-width: 1200px) {
  .console-section {
    min-height: 100vh; /* Ajuster la hauteur si nécessaire */
    padding: 50px 100px; /* Augmentation des marges pour remplir l'espace */
    background-size: cover; /* L'image de fond doit couvrir tout l'espace disponible */
  }
  
  .carousel-control-prev {
    left: -80px; /* Décale encore plus à gauche si nécessaire pour les très grands écrans */
  }
  .carousel-control-prev {
    left: -150px; /* Décale encore plus à gauche si nécessaire pour les très grands écrans */
  }
  .console-slide {
    padding: 70px; /* Augmentation de l'espace intérieur pour chaque slide */
    width: 80%; /* Largeur du carousel augmentée à 80% */
    margin: 125px;
    max-width: 1200px; /* Limiter la largeur maximale pour que ça ne devienne pas trop grand */
  }

  /* Agrandissement du texte pour les éléments du carousel */
  .console-slide h5 {
    font-size: 8rem;
  }

  .console-slide p {
    font-size: 1.5rem; /* Agrandir la description à 1.5rem */
  }

  .console-slide img {
    max-height: 1800px; /* Agrandir les images à une hauteur maximale de 500px */
   
    object-fit: contain; /* S'assurer que les images conservent leurs proportions */
  }
  
  /* Agrandissement du bouton "DÉCOUVREZ" */
  .discover-btn {
    padding: 15px 30px; /* Agrandir le bouton */
    font-size: 1.5rem; /* Augmenter la taille du texte à 1.5rem */
  }
}
/* Make the carousel responsive */
@media (min-width: 601px)and (max-width: 1200px) {
    .console-slide h5 {
    font-size: 1.2rem;
  }

  .console-slide p {
    font-size: 0.8rem;
  }
  .console-slide {
  padding: 20px;
    margin: 100px;

  width: 70%;
  
}
  .console-slide img {
    max-height: 200px;
  }

  .console-section {
    min-height: 60vh;
  }
}
@media (min-width: 400px) and (max-width: 600px) {
  .console-slide h5 {
    font-size: 1.2rem;
  }

  .console-slide p {
    font-size: 0.8rem;
  }
  .console-slide {
  padding: 20px;
    margin: 70px;

  width: 70%;
  
}
  .console-slide img {
    max-height: 200px;
  }

  .console-section {
    min-height: 60vh;
  }
}

/* Additional styling for smaller screens */
@media (max-width: 400px) {
  .console-slide h5 {
    font-size: 1rem;
  }

  .console-slide p {
    font-size: 0.7rem;
  }

  .discover-btn {
    font-size: 0.8rem;
  }
  .console-section {
    min-height: 0vh;

  }
  .console-slide {
  padding: 20px;
    margin: 55px;

  width: 70%;
  
}
  
}


/*page acceuill*/
.container h1{
    font-family:"Press Start 2P", system-ui;
    color: #fff;
}
.acceuil_section{
    min-height: 100vh;
    background: 
    linear-gradient(to top, #16014A, rgba(0, 0, 255, 0) 20%), /* Dégradé du bas vers le haut */
    url("../assets/img_acceuil.png"); /* Image de fond */    background-size: cover;
    background-position: center;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center; /* Centre verticalement et horizontalement */
}
.container {
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center; /* Centre le texte dans le conteneur */
  text-align: center;
}
h1 {
  font-size: 6rem;
  line-height: 1.2;
  span.typed-text {
    color: #d2b94b;
  }
}
.blinking-cursor {
  font-size: 6rem;
  color: #2c3e50;
  -webkit-animation: 1s blink step-end infinite;
  -moz-animation: 1s blink step-end infinite;
  -ms-animation: 1s blink step-end infinite;
  -o-animation: 1s blink step-end infinite;
  animation: 1s blink step-end infinite;
}
@keyframes blink {
  from,
  to {
    color: transparent;
  }
  50% {
    color: #2c3e50;
  }
}

/* Ajustement de la taille du texte pour les très petits écrans (moins de 375px) */
/* Ajustement de la taille du texte pour les très petits écrans (moins de 375px) */
@media (max-width: 375px) {
  .container h1 {
    font-size: 1.5rem; /* Réduction maximale pour les petits mobiles */
  }

  span.typed-text {
    font-size: 0.4rem; /* Réduction du texte animé pour petits mobiles */
  }

  .blinking-cursor {
    font-size: 1rem; /* Taille du curseur pour petits mobiles */
  }

  /* Ajustement de l'image d'arrière-plan pour les petits écrans */
  .acceuil_section {
    min-height: 0vh; /* Assure que la section prend toute la hauteur de l'écran */
    height: 24.5vh;
    width: 99.7%; /* Ajuste la largeur pour s'adapter à l'écran */
    background-size: contain; /* L'image reste complète, adaptée à la largeur ou la hauteur */
    background-position: center center; /* L'image est centrée verticalement et horizontalement */
    background-repeat: no-repeat; /* Évite la répétition de l'image */
    overflow: hidden; /* Garde tout excédent hors de vue */
    display: flex;
    justify-content: center;
    align-items: center; /* Centre le texte verticalement et horizontalement */
  }
}
/* Ajustement pour les écrans petits à moyens (375px à 768px) */
@media (min-width: 375px) and (max-width: 500px) {
  .container h1 {
    font-size: 1.5rem; /* Réduction pour les petits et moyens mobiles */
  }

  span.typed-text {
    font-size: 0.7rem; /* Ajustement pour le texte animé */
  }

  .blinking-cursor {
    font-size: 1.5rem; /* Ajustement de la taille du curseur */
  }

  /* Ajustement de l'image d'arrière-plan pour les écrans moyens */
  .acceuil_section {
    min-height: 0vh; /* Assure que la section prend toute la hauteur de l'écran */
    height: 50vh; /* Hauteur ajustée pour s'adapter à la taille */
    width: 100%; /* Ajuste la largeur pour s'adapter à l'écran */
    background-size: cover; /* Couvrir tout l'espace disponible */
  }
}
/* Ajustement pour les écrans petits à moyens (375px à 768px) */
@media (min-width: 500px) and (max-width: 768px) {
  .container h1 {
    
    font-size: 2.5rem; /* Réduction pour les petits et moyens mobiles */
  }
  .acceuil_section::after {
    height: 70px; /* Diminuer la hauteur du dégradé pour petits écrans */
    bottom: 30px; /* Ajuster pour la hauteur de transition souhaitée */

  }

  span.typed-text {
    font-size: 0.7rem; /* Ajustement pour le texte animé */
  }

  .blinking-cursor {
    font-size: 1.5rem; /* Ajustement de la taille du curseur */
  }

  /* Ajustement de l'image d'arrière-plan pour les écrans moyens */
  .acceuil_section {
    min-height: 0vh; /* Assure que la section prend toute la hauteur de l'écran */
    height: 50vh; /* Hauteur ajustée pour s'adapter à la taille */
    width: 100%; /* Ajuste la largeur pour s'adapter à l'écran */
    background-size: cover; /* Couvrir tout l'espace disponible */
  }
}

/* Ajustement pour les écrans moyens à grands (768px à 1200px) */
@media (min-width: 768px) and (max-width: 1200px) {
  .container h1 {
    font-size: 4rem; /* Taille du texte pour les écrans moyens à grands */
  }

  span.typed-text {
    font-size: 1rem; /* Taille du texte animé ajustée */
  }

  .blinking-cursor {
    font-size: 2rem; /* Taille du curseur pour les écrans moyens à grands */
  }

  /* Ajustement de l'image d'arrière-plan pour les écrans grands */
  .acceuil_section {
    height: 70vh; /* Ajustement de la hauteur */
    background-size: cover; /* Couvrir tout l'espace disponible */
  }
}

/* Ajustement pour les très grands écrans (plus de 1200px) */
@media (min-width: 1200px) {
  .container h1 {
    font-size: 6rem; /* Taille du texte pour les très grands écrans */
  }

  span.typed-text {
    font-size: 1.5rem; /* Ajustement pour le texte animé */
  }

  .blinking-cursor {
    font-size: 3rem; /* Taille du curseur pour les très grands écrans */
  }

  /* Ajustement de l'image d'arrière-plan pour les très grands écrans */
  .acceuil_section {
    height: 100vh; /* Prend toute la hauteur de l'écran */
    background-size: cover; /* Couvrir tout l'espace disponible */
  }
}


</style>
