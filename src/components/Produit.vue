<script>
import acceuilImage from '../assets/acceuil_2.png';
import Article from './Article.vue'

export default {
 
  name: 'Produit',
  components: {
    Article, 
  },

  mounted() {
    const options = document.querySelectorAll('.options li');
    
    const paragraph = document.querySelector('.paragraph p');
    
    options.forEach(option => {
      option.addEventListener('click', function() {
        const content = this.getAttribute('data-content');
        paragraph.textContent = content;
        options.forEach(opt => opt.classList.remove('active'));
        this.classList.add('active');
      });
    });
  }
};
</script>
<template>
      <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Bayon&display=swap" rel="stylesheet">
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
        <div class="titre">
        <h2>Pour que ca marche mieux
           </h2>
            <h1>MODE D'EMPLOI</h1>
        </div>
        <div class="etapes">
            <div class="etape1">
            <h2>COULEUR DE L'ECRAN </h2>
            <img src="../assets/firstgb.png">
            <p>Pour ouvrir le mode couleurs, Il suffit de rester appuyer sur la molette contraste et ensuite haut ou bas pour faire défiler les modes de couleurs.
            <br>
            Il existe actuellement 8 modes de couleurs sur la console.</p>
            </div>
            <div class="etape2">
            <h2>RÉGLER LA LUMINOSITÉ DE L'ÉCRAN</h2>
            <img src="../assets/secondgb.png">
            <p>Il est possible d’ajuster la luminosité de la console, pour cela, il suffit d’utiliser la molette de contraste vers le bas ou le haut pour ajuster la luminosité</p>
            </div>
            <div class="etape3">
            <h2>BATTERIE RECHARGEABLE USB-C</h2>
            <img src="../assets/thirdgb.png">
            <p>La batterie a une capacité de 2300mAh.

            Il est important d’utiliser uniquement le câble de charge fourni avec la console. Pour le dock de charge, ne dépassez pas 5 W.
            Ne pas utiliser de dock type charge rapide. Celle ci n’est pas compatible.
            En termes d’autonomie, la batterie propose une durée de jeu entre 8 h et 10 h. Il est également possible de jouer branché</p>
            </div>
        </div>
     </div>

     

    </div>

</template>
<style>
.page_produit {
    background-image: url("../assets/acceuil_2.png"); 
    background-size: cover;
    background-position: center;
    min-height: 100vh;
   
}
.titre{
    border-radius: 40px;
    text-align: center;
    margin-bottom: 20px;
    min-width: calc(30%);
    max-height: fit-content;
}

.mode_emploi {
    padding: 20px;
    border-radius: 10px; 
    max-width: 1200px; 
    margin: 0 auto; 
    display: flex;
    flex-direction: column;
    ;
}



.titre h1 {
   
    color: #d4d4d4;
    margin: 10px 0;
    font-family: "Press Start 2P", system-ui;

}

.titre h2 {
    color: #333; 
    margin: 10px 0;
}

.etapes {
    display: grid;
    grid-template-columns: repeat(2, 1fr); 
    gap: 20px; 
    justify-items: center; 
    max-width: 1000px; 
    margin: 0 auto; 
    grid-template-columns: repeat(2, 1fr);
}

.etape1, .etape2, .etape3 {
    width: 100%; 
    max-width: 400px; 
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    text-align: center;
    padding: 20px;
    border-radius: 40px;
    background: rgba(0, 0, 0, 0.7); 
}


.etape3 {
    grid-column: span 2; 
}

.etape1 h2, .etape2 h2, .etape3 h2 {
    color: #e6e6e6;
    margin-bottom: 10px;
    font-family: "Press Start 2P", system-ui;
}

.etape1 p, .etape2 p, .etape3 p {
    font-size: 0.8em;
    color: #fff;
    line-height: 1.9;
    font-family: "bayon";
 
}

.etape1 img, .etape2 img, .etape3 img {
   max-width: calc(60%);
   margin-bottom: 2rem;

}


.description {
  max-width: 900px;
  margin: 0 auto;
  border-radius: 15px;
  padding: 20px;
}

.options ul {
  list-style-type: none;
  padding: 0;
  display: flex;
  justify-content: space-between;
  margin-bottom: 20px;
  border-radius: 10px;
  overflow: hidden;
}

.options li {
  cursor: pointer;
  padding: 15px;
  flex: 1;
  text-align: center;
  font-family: "Bayon", sans-serif;
  background: rgba(0, 0, 0, 0.7); 
  color: #f9f5f5;
  transition: all ease-in-out 0.3s ;
  border-bottom: 2px solid transparent;

}

.options li:hover {
    transition: all ease-in-out 0.3s ;

    border-bottom: 2px solid #f90aad;
}

.options li.active {
    background-color: #f90aad;
    border-bottom: 2px solid #000000;


  color: #fff;
}

.paragraph p {
  font-size: 1em;
  color: #ffffff;
  
  
}

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
        grid-template-columns: 1fr; 
    }

    .etape3 {
        grid-column: span 1; 
    }
}



</style>