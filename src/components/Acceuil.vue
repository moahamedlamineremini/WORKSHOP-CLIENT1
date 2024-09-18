<script>
import acceuilImage from '../assets/acceuil_2.png';
import pspImage from '../assets/psp.webp';


export default {
  name: "typeWiriter",
  data() {
    return {
      typeValue: "",
      typeStatus: false,
      displayTextArray: ["Revivez vos classiques améliorés !"],
      typingSpeed: 150,
      erasingSpeed: 100,
      newTextDelay: 2000,
      displayTextArrayIndex: 0,
      charIndex: 0,
      currentSlide: 0, // index de la diapositive actuelle
      carouselItems: [
        { image: acceuilImage, alt: 'description 1' },
        { image: pspImage, alt: 'description 9' },
        
        
      ]
    };
  },
  
  
  created() {
    setTimeout(this.typeText, this.newTextDelay + 500);
    // Démarre le carousel
    setInterval(this.nextSlide, 5000); // Change de diapositive toutes les 5 secondes
  },
  methods: {
    //methode pour le titre en typewriter )
    typeText() {
      if (this.charIndex < this.displayTextArray[this.displayTextArrayIndex].length) {
        if (!this.typeStatus) this.typeStatus = true;
        this.typeValue += this.displayTextArray[this.displayTextArrayIndex].charAt(this.charIndex);
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
        this.typeValue = this.displayTextArray[this.displayTextArrayIndex].substring(0, this.charIndex - 1);
        this.charIndex -= 1;
        setTimeout(this.eraseText, this.erasingSpeed);
      } else {
        this.typeStatus = false;
        this.displayTextArrayIndex += 1;
        if (this.displayTextArrayIndex >= this.displayTextArray.length) this.displayTextArrayIndex = 0;
        setTimeout(this.typeText, this.typingSpeed + 1000);
      }
    },
    //methode pour le carousel passage de slide
    nextSlide() {
      this.currentSlide = (this.currentSlide + 1) % this.carouselItems.length;
    },
    prevSlide() {
      this.currentSlide = (this.currentSlide - 1 + this.carouselItems.length) % this.carouselItems.length;
    }
  }
};


  </script>
<template>
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
    <div class="acceuil_section2">
    <section class="ps-vita">
   
      <br>
      <div class="carousel-container">
        <div class="carousel-slides">
  <div v-for="(item, index) in carouselItems" :key="index" class="carousel-slide" v-show="currentSlide === index">
    <img :src='item.image' :alt="item.alt">
  </div>
  </div>
  <div class="carousel-buttons">
    <button @click="prevSlide" class="carousel-button">❮</button>
    <button @click="nextSlide" class="carousel-button">❯</button>
  </div>
</div>

    </section>

    <section class="customisation">
      <h2>CUSTOMISATION</h2>
      <h3>Construit ta propre console</h3>
      <div>
        <p>Faites revivre les icônes des plus grands classiques des jeux retro gaming !
 Plongez dans l’âge d’or des jeux vidéo des années 70, 80 et 90, et 2000 retrouver l’énergie de la nostalgie de vos parties légendaires ou découvrez des pépites du gaming qui vous avaient peut-être échappé à l’époque. 
Avec plus de 90 000 jeux intégrés à nos consoles rétro, des heures de jeu vous attendent auprès de vos héros préférés, que ce soit en solo ou en compagnie de vos proches, grâce aux modes multijoueurs.</p>
<div className='vertical_line1'></div>
<img src="../assets/acceuil_games.png">
      </div>
    </section>

    <section>
      <div class="console-cards">
      <div class="card">
        <div class="card-content">
        <h3>LE PLUS GRAND ECRAN</h3>
        <h1>GAMEBOY COLOR</h1>
        <button class="">Personnaliser</button>
        </div>
        <img src="../assets/gameboy_bleu.png" alt="Gameboy Color Image 1">
        </div>
      <div class="card">
        <div class="card-content">
        <h3>La plus polyvalente</h3>
        <h1>GAMEBOY ADVANCE</h1>
        <button>Personnaliser</button>
        </div>
        <img src="../assets/gameboy_vert.png" alt="Gameboy Color Image 1">
        </div>
      <div class="card">
        <div class="card-content">
        <h3>La plus pratique</h3>
        <h1>ADVANCE SP</h1>
        <button>Personnaliser</button>
        </div>
        <img src="../assets/advance_sp.png" alt="Gameboy Color Image 1">
        </div>
      <div class="card">
        <div class="card-content">
        <h3>L'originale</h3>
        <h1> GAMEBOY DMG</h1>
        <button>Personnaliser</button>
        </div>
        <img src="../assets/gameboy_gris.png" alt="Gameboy Color Image 1">
        </div>
    </div>
    </section>

    <section class="edition-limitees">
      <div class="overlay d-flex justify-content-center align-items-center">
        <div class="text-center">
         
          <h2 class="display-4 text-uppercase fw-bold">Édition Limitées</h2>
          <p class="lead">Créés pour être unique</p>
          <button class="btn-pink">Découvrez</button>
        </div>
      </div>
    </section>
</div>


</template>
<style>
.container h1{
    font-family:"Press Start 2P", system-ui;
    color: #fff;
    max-width: 90vw; /* Limiter la largeur du texte */
    overflow: hidden; /* Éviter le débordement */
}
.acceuil_section{
  height: fit-content;
  background-image: url("../assets/img_acceuil.png");
  background-size: cover;
  background-position: center;
  background-attachment: fixed;
  overflow: hidden; 

}
.acceuil_section2{
background-image: url("../assets/acceuil_2.png"); 
background-size: cover;
background-position: center;
min-height: fit-content;
overflow: hidden; 

}
.acceuil_section2 section{
    margin-bottom: 5rem;
}
.acceuil_section2 h2{
    color:#fff;
    text-align: center;
    font-family: "Press Start 2P", system-ui;;
    color:#951B81;

}


.customisation h3{
    color:#fff;
    text-align: center;
    font-family: "Press Start 2P", system-ui;;
    color:#fff;
    margin-bottom: 5rem;
}

.customisation div{
    display: flex;
    justify-content: center;
    flex-direction: row;
    margin-right: 1rem;
}
.vertical_line1{
  width: 1px; 
  height:20rem;
  background-color: rgb(57, 57, 57); 
  margin-right: 50px;
}
.customisation p{
    text-align: center;
  width: 40%;
  margin-bottom: 3%;
  color: #fff;
}
.container {
  max-width: fit-content;
  margin: 0;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
}
h1 {
  font-size: 6rem;
  span.typed-text {
    color: #d2b94b;
  }
}
.blinking-cursor {
  font-size: 3rem;
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
@-moz-keyframes blink {
  from,
  to {
    color: transparent;
  }
  50% {
    color: #2c3e50;
  }
}
@-webkit-keyframes blink {
  from,
  to {
    color: transparent;
  }
  50% {
    color: #2c3e50;
  }
}
@-ms-keyframes blink {
  from,
  to {
    color: transparent;
  }
  50% {
    color: #2c3e50;
  }
}
@-o-keyframes blink {
  from,
  to {
    color: transparent;
  }
  50% {
    color: #2c3e50;
  }
}
.carousel-container {
  position: relative;
  width: 100%;
  max-width: 800px;
  margin: 0 auto;
  overflow: hidden;
}
.carousel-slides {
  display: flex;
  transition: transform 1s ease;
}
.carousel-slide {
  min-width: 100%;
}

@keyframes slide {
  0% { transform: translateX(0); }
  25% { transform: translateX(-100%); }
  50% { transform: translateX(-200%); }
  75% { transform: translateX(-300%); }
  100% { transform: translateX(0); }
}

.carousel-slide img {
  width: 100%;
  height: auto;
}

.carousel-buttons {
  position: absolute;
  top: 50%;
  width: 100%;
  display: flex;
  justify-content: space-between;
  transform: translateY(-50%); /* Centrer les boutons verticalement */
}

.carousel-button {
  background-color: rgba(0, 0, 0, 0.5);
  border: none;
  padding: 10px;
  cursor: pointer;
  color: #fff;
  font-size: 2rem; /* Ajuster la taille si nécessaire */
}
.carousel-button:hover {
  background-color: rgba(72, 72, 72, 0.5);
  transition: all 0.5;
 
}

.console-cards {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 40px;
  padding: 20px;
}
.console-cards .card h3{
font-family: "Bayon", sans-serif;
}
.console-cards .card h1{
font-family: "Bayon", sans-serif;
margin-bottom: 3rem;
}


.console-cards .card {
  background: linear-gradient(135deg, #ffdd00, #40bfdb); 
  border-radius: 40px;
  overflow: hidden;
  width: calc(50% - 150px); 
  min-height: fit-content;
  text-align: center;
  color: white;
  position: relative;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}
.console-cards .card img{
  width: fit-content;
  align-self: center;
  display: flex;
  
}
.console-cards button {
background-color: #1B015C;
text-align: center;
width: fit-content;
border-radius: 10px;
transition: transform 0.3s ease, background-color 0.3s ease; /* Smooth transition */

color: #fff;

}
.console-cards button:hover {
  transform: scale(1.1);
background-color: #4d4d4d;

}

.edition-limitees {
  background-image: url('../assets/retrobg.png');
  background-size: cover;
  background-position: center;
  display: flex;
  justify-content: center;
  align-items: center;
  align-self: center;
  height: 400px;
  border-radius: 20px;
  overflow: hidden;
}
h2 {
  font-family: 'Press Start 2P', sans-serif;
  color: white;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
}

p {
  font-family: 'Press Start 2P', sans-serif;
  color: #c0c0c0;
  text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.8);
}

.btn-pink{
  background-color: #ff0080;
  color: white;
  border-radius: 40px;
  padding: 10px 20px;
  border: none;
  text-transform: uppercase;
}

.btn-pink:hover {
  transition: all 0.3s;

  background-color: #f657a6;
}

</style>