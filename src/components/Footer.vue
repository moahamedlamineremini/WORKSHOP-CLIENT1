<template>
    <footer class="bg-dark text-white pt-4">
      <div class="container">
        <div class="row">
       
          <div class="col-md-4 mb-3">
         <img src="../assets/logo_metroid.webp">
          <h3>Suivez-nous</h3>
          <ul class="list-unstyled d-flex">
            <li class="me-3"><a href="#"><font-awesome-icon :icon="['fab', 'facebook']" /></a></li>
            <li class="me-3"><a href="#"><font-awesome-icon :icon="['fab', 'twitter']" /></a></li>
            <li class="me-3"><a href="#"><font-awesome-icon :icon="['fab', 'tiktok']" /></a></li>
            <li><a href="#"><font-awesome-icon :icon="['fab', 'instagram']" /></a></li>
          </ul>
        </div>
          <!-- Products Links -->
          <div class="col-md-4 mb-3">
            <h3>Nos Produits</h3>
            <ul class="list-unstyled">
              <li><a href="/">PSvita-oled</a></li>
              <li><a href="/">Nintendo DS Lite</a></li>
              <li><a href="/">GameBoy Color</a></li>
              <li><a href="/">GameBoy Advance</a></li>
              <li><a href="/">GameBoy Advance SP</a></li>
              <li><a href="/">GameBoy DMG</a></li>
            </ul>
          </div>
          <!-- Legal Links -->
          <div class="col-md-4 mb-3">
            <h3>Informations pratiques</h3>
            <ul class="list-unstyled">
              <li><a href="/mentions-legales">Mentions légales</a></li>
              <li><a href="/cgv">Conditions Générales de vente</a></li>
              <li><a href="/confidentialite">Politique de confidentialité</a></li>
              <li><a href="/faq">FAQ</a></li>
            </ul>
            <p class="text-center mt-3">Tous droits réservés – Retrometroid 2024</p>
          </div>
        </div>
      </div>
    </footer>
  </template>
  
  <style scoped>
 
  footer{
    display: flex;
    height: auto;
    background-color: rgb(0, 0, 0);
    width: 100%;
    position: fixed;
    bottom: 0;
    left: 0;
    justify-content: space-between;  }
  footer a {
    color: white;
    text-decoration: none;
  }
  
  footer a:hover {
    text-decoration: underline;
  }
  
  footer ul li {
    margin-bottom: 10px;
  }
  h3{
    margin-bottom: 1.2rem;
  }
  img{
    max-width: 18rem;
  height: auto; 
  display: block;
  margin-bottom: 8rem;  }
  
.footer1-3 p {
  margin-bottom: 0;
  text-align: end;
}

  </style>
  