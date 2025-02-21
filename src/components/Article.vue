<script >
import defaultFrontCoque from '../assets/images_produit/FRONT/GB-Front-GB-GB_FRONT_SHELL_Blue0023.jpg';
import defaultSideCoque from '../assets/images_produit/SIDE/GB-Side-GB_SIDE_Black0024.jpg';

import defaultSideCoqueArriere from '../assets/images_produit/SIDE/GB-Side-GB_SIDE_Blue0024DUAL.png';
import defaultFrontButtons from '../assets/images_produit/FRONT/GB-Front-GB_FRONT_BUTTON_Red0023.png';
import defaultSideButtons from '../assets/images_produit/SIDE/GB-Side-GB_SIDE_BUTTON_Red0023.png';
import defaultFrontEcran from '../assets/images_produit/FRONT/GB-Front-GB_FRONT_IPS_DMG.png';
import defaultSideEcran from '../assets/images_produit/SIDE/GB-Side-GB-SIDE-IPS_Black.png';
import defaultFrontPads from '../assets/images_produit/FRONT/GB-Front-GB_FRONT_PAD_Yellow0023.png';
import defaultSidePads from '../assets/images_produit/SIDE/GB-Side-GB_SIDE_PAD_Black0024.png';
import defaultFrontBatterie from '../assets/images_produit/FRONT/GB-Front-Front_USBC-02.png';
import defaultSideBatterie from '../assets/images_produit/SIDE/GB-Side-USBC-02.png';
import { library } from '@fortawesome/fontawesome-svg-core'
import { faRotateRight, faRotateLeft, faGamepad, faDiceD6 } from '@fortawesome/free-solid-svg-icons'

library.add(faRotateRight, faRotateLeft, faGamepad, faDiceD6)
export default {
  name: 'Article', 
  data() {
    return {
    title: 'Personnalisation de Console',
    activeSection: null,
    view: 'front',
    defaultFrontBatterie: defaultFrontBatterie, // Ajoutez cette ligne
    defaultSideBatterie: defaultSideBatterie,   // Ajoutez cette ligne
    selectedColor: null,
    selectedOptions: {
        base: null,
        coque: defaultFrontCoque,
        sideCoque: defaultSideCoque,
        sideCoqueArriere: defaultSideCoqueArriere,
        ecran: defaultFrontEcran,
        sideEcran: defaultSideEcran,
        boutons: defaultFrontButtons,
        sideBoutons: defaultSideButtons,
        pads: defaultFrontPads,
        sidePads: defaultSidePads,
      
        frontBatterie: "",
        sideBatterie: "",
        accessoires1: null,
        accessoires2: null,
        accessoires3: null,
      },
      totalPrice: 129.0,
      optionsList: ['BASE CONSOLE', 'COQUE', 'COQUE ARRIERE', 'ECRAN', 'BOUTONS', 'PADS',  'BATTERIE', 'ACCESSOIRES'],
      colors: ['Black', 'Blue', 'Green'],
      colors_side: ['Black',  'Blue', 'Green'],
      colors_btn: ['Black', 'Red', 'Blue'],
      colors_pads: ['Black', 'Red', 'Blue', 'Green' , 'Yellow'],
      colors_ecran:['Black','DMG']
    };
  },
  methods: {
    toggleView() {
      this.view = this.view === 'front' ? 'side' : 'front';
    },
    setActiveSection(option) {
      this.activeSection = this.activeSection === option ? null : option;},

    handleOptionChange(option, price, color) {
    const optionKey = this.view === 'side' ? `side${option.charAt(0).toUpperCase() + option.slice(1)}` : option;

    const currentImagePath = this.selectedOptions[optionKey];

    if (!currentImagePath) {
        console.warn(`Current image path is undefined for option: ${optionKey}`);
        return;
    }

    const availableColors = option === 'boutons' ? this.colors_btn 
                        : option === 'pads' ? this.colors_pads 
                        : option === 'ecran' ? this.colors_ecran
                        : option === 'coqueArriere' ? this.colors_side
                        : this.colors;

    const currentColor = availableColors.find(c => currentImagePath.includes(`_${c}`));

    if (currentColor ) {
        const newPath = currentImagePath.replace(`_${currentColor}`, `_${color}`);
        this.selectedOptions[optionKey] = newPath;
        this.totalPrice += price;
    }
     else {

        console.warn(`Current image path: ${currentImagePath}`);
        console.warn(`No matching color found for option: ${optionKey}`);
    }
},
updatePriceCoquearriere(color) {
    if (color === null) {
        if (this.selectedColor !== null) {
            this.totalPrice -= 11.9;
            this.selectedOptions.baseAdded = false;

        }
        this.selectedColor = null; 
        return; 
    }

    if (this.selectedColor === null) {
        this.totalPrice += 11.9; 
        this.selectedOptions.baseAdded = true;

    }

    this.selectedColor = color; 
},



updatePriceConsole() {
    if (this.selectedOptions.base === "Je nai pas de console à fournir") {
        if (!this.selectedOptions.baseAdded) {
            this.totalPrice += 40;
            this.selectedOptions.baseAdded = true; 
        }
    } else if (this.selectedOptions.base === "J'ai déjà une console") {
        if (this.selectedOptions.baseAdded) {
            this.totalPrice -= 40;
            this.selectedOptions.baseAdded = false; 
        }
    }
},

updatePriceAndImageBatterie() {
  if (this.selectedOptions.batterie === "batterie") {
    if (!this.selectedOptions.batterieAdded) {
      this.totalPrice += 40;
      this.selectedOptions.batterieAdded = true;
      this.selectedOptions.frontBatterie = this.defaultFrontBatterie; // Utilisez this.defaultFrontBatterie
      this.selectedOptions.sideBatterie = this.defaultSideBatterie;   // Utilisez this.defaultSideBatterie
    }
  } else if (this.selectedOptions.batterie === "") {
    if (this.selectedOptions.batterieAdded) {
      this.totalPrice -= 40;
      this.selectedOptions.batterieAdded = false;
      this.selectedOptions.frontBatterie = ''; // Réinitialisez à vide
      this.selectedOptions.sideBatterie = '';  // Réinitialisez à vide
    }
  }
},

addclickeffet(){
    const button = document.querySelector('.color-none');
    button.classList.toggle('clicked');
},
updatePriceAccessoire(accessoire) {
        switch (accessoire) {
            case 'accessoire1':
                if (this.selectedOptions.accessoires1) {
                    if (!this.selectedOptions.accessoire1Added) {
                        this.totalPrice += 4.9;
                        this.selectedOptions.accessoire1Added = true;
                    }
                } else if (this.selectedOptions.accessoire1Added) {
                    this.totalPrice -= 4.9;
                    this.selectedOptions.accessoire1Added = false;
                }
                break;
            case 'accessoire2':
                if (this.selectedOptions.accessoires2) {
                    if (!this.selectedOptions.accessoire2Added) {
                        this.totalPrice += 6.9;
                        this.selectedOptions.accessoire2Added = true;
                    }
                } else if (this.selectedOptions.accessoire2Added) {
                    this.totalPrice -= 6.9;
                    this.selectedOptions.accessoire2Added = false;
                }
                break;
            case 'accessoire3':
                if (this.selectedOptions.accessoires3) {
                    if (this.selectedOptions.accessoire1Added) {
                        this.totalPrice -= 4.9;
                        this.selectedOptions.accessoire1Added = false;
                    }
                    if (this.selectedOptions.accessoire2Added) {
                        this.totalPrice -= 6.9;
                        this.selectedOptions.accessoire2Added = false;
                    }
                }
                break;
        }
    },

  },
  mounted() {
    console.log('Component mounted. Initial boutons:', this.selectedOptions.ecran);
  },
  watch: {
    'selectedOptions.ecran': function(newValue) {
      console.log('ecran changed to:', newValue);
    }
  }
};

</script>

<template>
<div class="personnalisation-container">
    <h1 class="personnalisation-title" style="color: #544297">{{ title || 'Personnalisation de Console' }}</h1>
    <button class="rotate-btn" @click="toggleView">
    <div class="rotate-icon-container">
      <font-awesome-icon 
        :icon="view === 'front' ? 'fa-solid fa-rotate-right' : 'fa-solid fa-rotate-left'" 
        class="rotate-icon"
      />
      <!--<font-awesome-icon 
        :icon="view === 'front' ? 'fa-solid fa-gamepad' : 'fa-solid fa-dice-d6'" 
        class="view-icon"
      />-->
    </div>
  </button>

    <div class="console-viewer">
      <div class="image-wrapper">
        <img :src="view === 'front' ? selectedOptions.coque : selectedOptions.sideCoque" alt="coque" class="personnalisation-image" />
        <img 
  v-if="view === 'front' ? selectedOptions.frontBatterie : selectedOptions.sideBatterie"
  :src="view === 'front' ? selectedOptions.frontBatterie : selectedOptions.sideBatterie" 
  alt="img batterie" 
  class="personnalisation-image batterie" 
/>    
        <img v-if="view === 'side'" :src="selectedOptions.sideCoqueArriere" alt="coque arriere" class="personnalisation-image" />
        <img :src="view === 'front' ? selectedOptions.boutons : selectedOptions.sideBoutons" alt="boutons" class="personnalisation-image boutons" />
        <img :src="view === 'front' ? selectedOptions.ecran : selectedOptions.sideEcran" alt="écran" class="personnalisation-image ecran" />
        <img :src="view === 'front' ? selectedOptions.pads : selectedOptions.sidePads" alt="pads" class="personnalisation-image pads" />
      </div>
    </div>
    <div class="global-container">
    <div class="form-container" style="border-radius: 10px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
      <!-- Liste des sections -->
      <div v-for="option in optionsList" :key="option" class="form-group">
        <div class="section-option" @click="setActiveSection(option)">
          <span>{{ option.toUpperCase() }}</span>
          <i :class="`fas ${activeSection === option ? 'fa-chevron-down' : 'fa-chevron-right'}`"></i>
        </div>
        <div v-if="activeSection === option" class="option-content">
          <template v-if="option === 'COQUE'">
            <div class="color-options">
      <button v-for="color in colors" :key="color" class="color-circle" :class="color" @click="handleOptionChange('coque', 0, color)">
      </button>
    </div>
          </template>
          <template v-if="option === 'COQUE ARRIERE'">
    <div class="color-options">
        <button 
            v-for="color in colors_side" 
            :key="color" 
            class="color-circle" 
            :class="color" 
            @click="handleOptionChange('CoqueArriere', 0, color); updatePriceCoquearriere(color)">
        </button>
        <button 
      class="color-none" 
      @click="updatePriceCoquearriere(null);addclickeffet()">
      Sans
    </button>
    </div>
</template>

          <template v-if="option === 'BOUTONS'">
            <div class="color-options">
      <button v-for="color in colors_btn" :key="color" class="color-circle" :class="color" @click="handleOptionChange('boutons', 0, color)">
      </button>
    </div>
          </template>
          <template v-if="option === 'PADS'">
            <div class="color-options">
      <button v-for="color in colors_pads" :key="color" class="color-circle" :class="color" @click="handleOptionChange('pads', 0, color)">
      </button>
    </div>
          </template>
          <template v-if="option === 'ECRAN'">
            <div class="color-options">
      <button v-for="color in colors_ecran" :key="color" class="color-circle" :class="color" @click="handleOptionChange('ecran', 0, color)">
      </button>
    </div>
          </template>
          <template v-else>
            <div>
              <template v-if="option === 'BATTERIE'">
                <div>
                  
                  <label>
                    <input type="radio" name="batterie" value="batterie" v-model="selectedOptions.batterie" @change="updatePriceAndImageBatterie() " />
                    Batterie + Câble USB-C (+40€)
                  </label>
                  <label>
  <input type="radio" name="batterie" value="" v-model="selectedOptions.batterie" @change="updatePriceAndImageBatterie()" />
  Aucune batterie
</label>
               
                </div>
              </template>
              <template v-if="option === 'BASE CONSOLE'">
                <div>
    <label>
      <input type="radio" name="baseconsole" value="Je nai pas de console à fournir" v-model="selectedOptions.base" @change="updatePriceConsole()" />
      Je n'ai pas de console à fournir (+40€)
    </label>
    <label>
      <input type="radio" name="baseconsole" value="J'ai déjà une console" v-model="selectedOptions.base" @change="updatePriceConsole()"  />
      J'ai déjà une console (0€) 
    </label>
  </div>
</template>
<template v-if="option === 'ACCESSOIRES'">
    <div>
        <label>
            <input type="radio" name="accessoires" value="accessoire1" v-model="selectedOptions.accessoires1" @change="updatePriceAccessoire('accessoire1')" />
            Verre trempé (+4.90€)
        </label>
        <label>
            <input type="radio" name="accessoires" value="accessoire2" v-model="selectedOptions.accessoires2" @change="updatePriceAccessoire('accessoire2')" />
            Coque Silicone (+6.90€)
        </label>
        <label>
            <input type="radio" name="accessoires" value="accessoire3" v-model="selectedOptions.accessoires3" @change="updatePriceAccessoire('accessoire3')" />
            Pas d'accessoire (+0€)
        </label>
    </div>
</template>


             
            </div>
          </template>
        </div>
      </div>
    </div>

    <div class="price-container" style="border-radius: 10px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); padding: 20px; margin-top: 20px;">
      <h3>{{ totalPrice.toFixed(2) }}€</h3>
      <h1>Prix total</h1>
      <p>Acompte (30%) : {{ (totalPrice * 0.3).toFixed(2) }}€</p>
      <p>Livraison dans 35 - 40 jours</p>

      <button class="submit-btn">
        <i class="fas fa-shopping-cart">Ajouter au panier</i>
      </button>
    </div>
  </div></div>
</template>

<style>
:root {
    --color-red: linear-gradient(135deg, #ff4b2b 0%, #ff0000 100%);
    --color-blue: linear-gradient(135deg, #2193b0 0%, #6dd5ed 100%);
    --color-green: linear-gradient(135deg, #00b09b 0%, #96c93d 100%);
    --color-cleargreen: linear-gradient(135deg, #87ff79 0%, #ebede8 100%);
    --color-purple: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
    --color-yellow: linear-gradient(135deg, #f6d365 0%, #fda085 100%);
    --color-black: linear-gradient(135deg, #000000 0%, #000000 100%);
    --color-white: linear-gradient(135deg, #ffffff 0%, #f0f0f0 100%);
    --color-dmg: linear-gradient(135deg, #626262 0%, #e3e2e2 100%);
    
    
}
/* Styles généraux - adaptés pour les grands écrans */
.personnalisation-container {
    margin: auto;
    font-family: Arial, sans-serif;
    background-color: #F8F8F8;
}

.personnalisation-title {
    font-family: 'Bayon', system-ui;
    text-align: center;
    font-size: 2rem;
    color: #544297;
    margin-top: 2rem;
}

.console-viewer {
    position: relative;
    width: 300px;
    height: 450px;
    margin: 20px auto;
    
}

.image-wrapper {
    position: relative;
    width: 100%;
    height: auto;
}
.personnalisation-image {
    display: block;
    margin: 30px auto;
    max-width: 300px;
    border-radius: 10px;
    transform: perspective(500px) rotateX(5deg); /* Crée un léger effet 3D */
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.rotate-btn ,.submit-btn{
background-color: #544297;
border-radius: 20px;
padding: 10px;
    border: none;
  cursor: pointer;
  font-size: 24px; /* Taille de l'icône */
  color: #ffffff; /* Couleur par défaut */
  transition: color 0.3s ease, transform 0.3s ease;
  display: flex;
  align-items: center;
  gap: 8px;
}

.rotate-btn:hover, .submit-btn:hover {
  color: #3a2a7b;
  background-color: #ffffff;
 

}

.rotate-btn svg {
  width: 24px;
  height: 24px;
  fill: currentColor;
}


.rotate-btn:hover {
  color: #a83279; /* Couleur au survol */
}
.personnalisation-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: auto;
    object-fit: contain;
    z-index: 1;
}
.form-container {
    width: 80%;
    align-self: center;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    margin-top: 2rem;
}

.form-group {
    margin-bottom: 20px;
}


/* Fichier Personnalisation.css */

.section-option {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    cursor: pointer;
}

.section-option span {
    font-weight: bold;
    font-size: 0.9rem;

}

.section-option i {
    font-size: 14px; /* Taille de l'icône */
    transition: transform 0.3s ease;
}

.section-option i.fa-chevron-down {
    transform: rotate(20deg); 
}



.option-content {
    margin-top: 10px;
    padding-left: 20px;
}


.option-content label {
    display: block;
    margin-bottom: 10px; 
}
.option-content label input[type="radio"] {
    margin-right: 10px;
}
.option-content label input[type="checkbox"] {
    margin-right: 10px;
}



color-options {
    display: flex;
   
    gap: 10px;
    margin-top: 10px;
}

.color-circle {
    width: 15px;
    height: 15px;
    border-radius: 50%;
    border: none;
    margin: 1%;
    cursor: pointer;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}


.color-circle:hover {
    transform: scale(1.1); 
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
}

.color-circle.Red {
    background: var(--color-red);
}

.color-circle.Blue {
    background: var(--color-blue);
}
.color-circle.DMG {
    background: var(--color-dmg);
}

.color-circle.Green {
    background: var(--color-green);
}
.color-circle.ClearGreen {
    background: var(--color-cleargreen);
}

.color-circle.Purple {
    background: var(--color-purple);
}

.color-circle.Yellow {
    background: var(--color-yellow);
}

.color-circle.Black {
    background: var(--color-black);
}

.color-circle.White {
    background: var(--color-white);
}

.price-container {
    background-color: #fff;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
}


.price-container h3 {
    font-size: 1.8rem;
}
.price-container h1 {
    font-size: 1rem;
    margin-bottom: 15px;
    margin-left: 0.2rem;
    color: #c5c3cd; /* Couleur du titre */
}


.price-container p {
    font-size: 1.2rem;
    margin-bottom: 10px;
    color: #908f91; /* Couleur du titre */

    
}

/*.submit-btn {
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 30px;
    font-size: 1.2rem;
    cursor: pointer;
    text-align: center;
    background: linear-gradient(90deg, #3f2b87, #8e7ff1);
    transition: background-color 0.3s;
}
.submit-btn:hover {
    background:linear-gradient(90deg, #8e7ff1, #3f2b87);
}

.submit-btn i {
    margin-right: 10px;
}    
*/
.global-container{
    display: flex;
    flex-direction: column;
    align-items: center;
}

/*test*/
/* Conteneur de l'image de personnalisation */



/* Styles communs pour chaque image de la console */


/* Ajustement pour chaque couche, en s'assurant que l'image s'empile correctement */
.personnalisation-image.boutons {
    z-index: 2; /* Les boutons au-dessus de la coque */
}

.personnalisation-image.ecran {
    z-index: 3; /* L'écran par-dessus les autres couches */
}

/* Petits écrans (moins de 768px) */
@media (max-width: 767px) {
    .personnalisation-container {
        padding: 10px;
        max-width: 100%;
    }

    .personnalisation-title {
        font-size: 1.5rem;
        margin-top: 1rem;
    }

    .console-viewer {
        width: 100%;
        max-width: 250px;
    }

    .form-container {
        width: 100%;
        padding: 10px;
        margin-top: 1rem;
    }

    .price-container {
        width: 100%;
        padding: 15px;
    }

    .submit-btn {
        width: 100%;
        margin-left: 0;
        font-size: 1rem;
    }

    .color-options {
        gap: 5px;
    }

    .color-circle {
        width: 12px;
        height: 12px;
    }
}

/* Écrans moyens (768px à 1024px) */
@media (min-width: 768px) and (max-width: 1024px) {
    .personnalisation-container {
        padding: 15px;
        max-width: 90%;
    }

    .personnalisation-title {
        font-size: 1.75rem;
        margin-top: 1.5rem;
    }

    .console-viewer {
        width: 100%;
        max-width: 270px;
    }

    .form-container {
        width: 85%;
        padding: 15px;
        margin-top: 50px;
    }

    .price-container {
        width: 85%;
        padding: 15px;
    }

    .submit-btn {
        width: 40%;
        margin-left: 30%;
        font-size: 1.1rem;
    }

    .color-options {
        gap: 8px;
    }

    .color-circle {
        width: 13px;
        height: 13px;
    }
}

/* Grands écrans (plus de 1024px) */
@media (min-width: 1025px) {
    .personnalisation-container {
        padding: 30px;
        max-width: 900px;
    }

    .console-viewer {
        width: 100%;
        max-width: 350px;
    }

    .form-container {
        width: 80%;
        padding: 20px;
    }

    .price-container {
        width: 80%;
        padding: 20px;
    }

    .submit-btn {
        width: 30%;
        margin-left: 35%;
        font-size: 1.2rem;
    }

    .color-circle {
        width: 15px;
        height: 15px;
    }
}

.rotate-btn {
  background-color: #544297;
  border-radius: 20px;
  padding: 12px 24px;
  border: none;
  cursor: pointer;
  transition: all 0.3s ease;
  display: flex;
  align-items: center;
  justify-content: center;
}

.rotate-icon-container {
  display: flex;
  align-items: center;
  gap: 10px;
}

.rotate-icon {
  font-size: 1.2rem;
  transition: transform 0.3s ease;
}

.view-icon {
  font-size: 1.2rem;
}

.rotate-btn:hover .rotate-icon {
  transform: rotate(180deg);
}

</style>