<script >
  export default {
  name: 'Article', // Le nom doit être 'Article'
  data() {
    return {
      title: 'Personnalisation de Console',
      activeSection: null,
      view: 'front',
      selectedOptions: {
        baseconsole: null,
        coque: null, // placeholder, will be set later
        coqueArriere: null,
        ecran: null, // placeholder
        boutons: null, // placeholder
        pads: null,
        batterie: null,
        accessoires: null,
      },
      totalPrice: 129.0,
      optionsList: ['BASE CONSOLE', 'COQUE', 'COQUE ARRIERE', 'ÉCRAN IPS RÉTROÉCLAIRÉ', 'BOUTONS', 'PADS',  'BATTERIE', 'ACCESSOIRES'],
      colors: ['blue', 'red', 'green', 'yellow', 'violet', 'black'],
    };
  },
  methods: {
    toggleView() {
      this.view = this.view === 'front' ? 'side' : 'front';
    },
    setActiveSection(option) {
      this.activeSection = this.activeSection === option ? null : option;
    },
    handleOptionChange(option, price, color) {
      const optionKey = this.view === 'side' ? `side${option.charAt(0).toUpperCase() + option.slice(1)}` : option;
      this.selectedOptions[optionKey] = color;
      this.totalPrice += price;
    },
    handleRadioChange(option, value, price) {
    // Récupérer l'ancienne valeur sélectionnée pour cet option
    const previousValue = this.selectedOptions[option];

    // Si l'utilisateur sélectionne l'option "Sans", remettre le prix à l'état initial
    if (previousValue && previousValue !== value) {
      if (previousValue === "Batterie + Câble USB-C") {
        this.totalPrice -= 40;  // Remettre 40€ si Batterie + Câble USB-C était sélectionné
      }
      if (previousValue === "Je nai pas de console à fournir") {
        this.totalPrice -= 40;  // Remettre 40€ si la base console était sélectionnée
      }
      if (previousValue === "Verre trempé") {
        this.totalPrice -= 4.90;  // Remettre le prix du verre trempé
      }
      if (previousValue === "Coque Silicone") {
        this.totalPrice -= 6.90;  // Remettre le prix de la coque silicone
      }
    }

    // Mettre à jour la valeur sélectionnée
    this.selectedOptions[option] = value;

    // Ajouter le prix de la nouvelle option
    this.totalPrice += price;
    
  },
  },
};


</script>

<template>
<div class="personnalisation-container">
    <h1 class="personnalisation-title" style="color: #544297">{{ title || 'Personnalisation de Console' }}</h1>

    <!-- Bouton pour basculer entre front et side -->
    <button class="rotate-btn" @click="toggleView">
      {{ view === 'front' ? 'Voir le côté' : "Voir l'avant" }}
    </button>

    <div class="console-viewer">
      <!-- Afficher l'image selon la vue actuelle (front ou side) -->
      <div class="image-wrapper">
        <template v-if="view === 'front'">
          <img v-if="selectedOptions.coque" :src="selectedOptions.coque" alt="coque front" class="personnalisation-image" />
          <img v-if="selectedOptions.boutons" :src="selectedOptions.boutons" alt="boutons front" class="personnalisation-image boutons" />
          <img v-if="selectedOptions.ecran" :src="selectedOptions.ecran" alt="écran front" class="personnalisation-image ecran" />
        </template>
        <template v-else>
          <img v-if="selectedOptions.sideCoque" :src="selectedOptions.sideCoque" alt="coque side" class="personnalisation-image" />
          <img v-if="selectedOptions.sideBoutons" :src="selectedOptions.sideBoutons" alt="boutons side" class="personnalisation-image boutons" />
        </template>
      </div>
    </div>

    <div class="form-container" style="border-radius: 10px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
      <!-- Liste des sections -->
      <div v-for="option in optionsList" :key="option" class="form-group">
        <div class="section-option" @click="setActiveSection(option)">
          <span>{{ option.toUpperCase() }}</span>
          <i :class="`fas ${activeSection === option ? 'fa-chevron-down' : 'fa-chevron-right'}`"></i>
        </div>
        <div v-if="activeSection === option" class="option-content">
          <template v-if="option === 'COQUE' || option === 'BOUTONS'|| option === 'COQUE ARRIERE'|| option === 'ÉCRAN IPS RÉTROÉCLAIRÉ'|| option === 'PADS'">
            <div class="color-options">
      <button v-for="color in colors" :key="color" class="color-circle" :class="color" @click="handleOptionChange('coque', 10, color)">
      </button>
    </div>
          </template>
          <template v-else>
            <div>
              <template v-if="option === 'BATTERIE'">
                <div>
                  <label>
                    <input type="radio" name="batterie" value="Sans" v-model="selectedOptions.batterie" @change="handleRadioChange('batterie', 'Sans', -40)" />
                    Sans
                  </label>
                  <label>
                    <input type="radio" name="batterie" value="Batterie + Câble USB-C" v-model="selectedOptions.batterie" @change="handleRadioChange('batterie', 'Batterie + Câble USB-C', 40)" />
                    Batterie + Câble USB-C (+40€)
                  </label>
                </div>
              </template>
              <template v-if="option === 'BASE CONSOLE'">
  <div>
    <label>
      <input type="radio" name="baseconsole" value="Sans" v-model="selectedOptions.baseconsole" @change="handleRadioChange('baseconsole', 'Sans',-40)" />
      Je fournis ma console
    </label>
    <label>
      <input type="radio" name="baseconsole" value="Je nai pas de console à fournir" v-model="selectedOptions.baseconsole" @change="handleRadioChange('baseconsole', 'Je nai pas de console à fournir', 40)" />
      Je n'ai pas de console à fournir (+40€)
    </label>
  </div>
</template>

              <template v-if="option === 'ACCESSOIRES'">
                <div>
                  <label>
                    <input type="radio" name="accessoires" value="Verre trempé" v-model="selectedOptions.accessoires" @change="handleRadioChange('accessoires', 'Verre trempé', 4.90)" />
                    Verre trempé (+4.90€)
                  </label>
                  <label>
                    <input type="radio" name="accessoires" value="Coque Silicone" v-model="selectedOptions.accessoires" @change="handleRadioChange('accessoires', 'Coque Silicone', 6.90)" />
                    Coque Silicone (+6.90€)
                  </label>
                </div>
              </template>

             
            </div>
          </template>
        </div>
      </div>
    </div>

    <!-- Section du prix total et bouton panier -->
    <div class="price-container" style="border-radius: 10px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); padding: 20px; margin-top: 20px;">
      <h3>{{ totalPrice.toFixed(2) }}€</h3>
      <h1>Prix total</h1>
      <p>Acompte (30%) : {{ (totalPrice * 0.3).toFixed(2) }}€</p>
      <p>Livraison dans 35 - 40 jours</p>

      <button class="submit-btn">
        <i class="fas fa-shopping-cart">Ajouter au panier</i>
      </button>
    </div>
  </div>
</template>

<style>

:root {
    --color-red: linear-gradient(135deg, #ff4b2b 0%, #ff416c 100%);
    --color-blue: linear-gradient(135deg, #2193b0 0%, #6dd5ed 100%);
    --color-green: linear-gradient(135deg, #00b09b 0%, #96c93d 100%);
    --color-purple: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
    --color-yellow: linear-gradient(135deg, #f6d365 0%, #fda085 100%);
    --color-black: linear-gradient(135deg, #2c3e50 0%, #4ca1af 100%);
    --color-white: linear-gradient(135deg, #ffffff 0%, #f0f0f0 100%);
}

.personnalisation-container {
    max-width: 900px;
    margin: auto;
    padding: 20px;
    font-family: Arial, sans-serif;
    background-color: #F8F8F8;
}

.personnalisation-title {
    font-family: 'Press Start 2P', cursive;
    text-align: center;
    font-size: 2rem;
    color: #544297; /* Couleur du titre */
    margin-top: 2rem;
}

.personnalisation-image {
    display: block;
    margin: 30px auto;
    max-width: 300px;
    border-radius: 10px;
    transform: perspective(500px) rotateX(5deg); /* Crée un léger effet 3D */
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.personnalisation-image:hover {
    transform: perspective(500px) rotateX(0deg) translateY(-10px); /* Effet d'élévation au survol */
    box-shadow: 0 30px 40px rgba(0, 0, 0, 0.4); /* Accentuation de l'ombre lors du hover */
}

.form-container {
    margin-top: 33rem;

    margin-left: 2rem;
    width: 80%;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
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
    transform: rotate(20deg); /* Fait pointer la flèche vers le bas */
}



.option-content {
    margin-top: 10px;
    padding-left: 20px;
}

/* Ajoute ce CSS pour afficher les labels l'un au-dessus de l'autre */
.option-content label {
    display: block;
    margin-bottom: 10px; /* Espace entre les options */
}
.option-content label input[type="radio"] {
    margin-right: 10px; /* Ajuste l'espace entre le bouton et le texte du label */
}
.option-content label input[type="checkbox"] {
    margin-right: 10px; /* Ajuste l'espace entre le bouton et le texte du label */
}





.color-options {
    display: flex;
    gap: 10px;
    margin-top: 10px;
}

.color-circle {
    width: 15px; /* Taille du bouton */
    height: 15px;
    border-radius: 50%;
    border: none;
    cursor: pointer;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.color-circle:hover {
    transform: scale(1.1); /* Zoom sur le bouton au survol */
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
}

.color-circle.red {
    background: var(--color-red);
}

.color-circle.blue {
    background: var(--color-blue);
}

.color-circle.green {
    background: var(--color-green);
}

.color-circle.purple {
    background: var(--color-purple);
}

.color-circle.yellow {
    background: var(--color-yellow);
}

.color-circle.black {
    background: var(--color-black);
}

.color-circle.white {
    background: var(--color-white);
}

.price-container {
    margin-left: 2rem;
    width: 80%;
    background-color: #fff;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
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

.submit-btn {
    margin-left: 17rem;

    width: 30%;
    background-color: #544297;
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
    background-color: #6a5acd;
}

.submit-btn i {
    margin-right: 10px;
}
/*test*/
/* Conteneur de l'image de personnalisation */
.console-viewer {
    position: relative;
    width: 300px; /* Ajuste la taille pour qu'elle corresponde à celle de l'image d'origine */
    height: auto;
    margin: 20px auto; /* Centrer le conteneur */
}

.image-wrapper {
    position: relative;
    width: 100%;
    height: auto;
}

/* Styles communs pour chaque image de la console */
.personnalisation-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: auto;
    object-fit: contain; /* Garde l'image dans la zone sans la déformer */
    z-index: 1; /* Superpose les images dans le bon ordre */
    transition: all 0.3s ease; /* Animation douce pour les changements d'options */
}

/* Ajustement pour chaque couche, en s'assurant que l'image s'empile correctement */
.personnalisation-image.boutons {
    z-index: 2; /* Les boutons au-dessus de la coque */
}

.personnalisation-image.ecran {
    z-index: 3; /* L'écran par-dessus les autres couches */
}

</style>