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
</template>
<style>
/* Styling for the console showcase */
/* Styling for the console showcase */
/* Position the hydra icon at the bottom-left */
/* Ensure the console-section is positioned relative */
.console-section {
  position: relative;
  /* Existing styling... */
}

.console-section {
  min-height: 80vh;
  background-image: url("../assets/page2.jpg");
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
    background-image: url("../assets/img_acceuil.png");
    background-size: cover;
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
