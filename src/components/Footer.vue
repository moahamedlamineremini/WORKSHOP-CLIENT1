<template>
  <footer class="bg-dark text-white pt-4 mt-auto">
    <div class="container">
      <!-- Bouton Hamburger -->
      <button class="navbar-toggler d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#footerMenu" aria-controls="footerMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Contenu du Footer repliable -->
      <div class="collapse d-md-block" id="footerMenu">
        <div class="row text-center text-md-start">
          <!-- Follow Us Section -->
          <div class="col-md-4 mb-4">
            <img src="../assets/logo_metroid.webp" alt="Logo Metroid" class="img-fluid mb-3">
            <h3>Suivez-nous</h3>
            <ul class="list-unstyled d-flex justify-content-center justify-content-md-start">
              <li class="me-3">
                <a href="#"><font-awesome-icon :icon="['fab', 'facebook']" /></a>
              </li>
              <li class="me-3">
                <a href="#"><font-awesome-icon :icon="['fab', 'twitter']" /></a>
              </li>
              <li class="me-3">
                <a href="#"><font-awesome-icon :icon="['fab', 'tiktok']" /></a>
              </li>
              <li>
                <a href="#"><font-awesome-icon :icon="['fab', 'instagram']" /></a>
              </li>
            </ul>
          </div>

          <!-- Products Links -->
          <div class="col-md-4 mb-4">
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
          <div class="col-md-4 mb-4">
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
    </div>
  </footer>
</template>

<style scoped>
footer {
  background-color: #000;
  width: 100%;
  padding: 2rem 0;
  color: azure;
}

h3 {
  margin-bottom: 1rem;
}

footer a {
  color: white;
  text-decoration: none;
}

footer a:hover {
  text-decoration: underline;
}

footer img {
  max-width: 100%;
  height: auto;
}

.navbar-toggler {
  border: none;
}

.navbar-toggler-icon {
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba%28255, 255, 255, 0.5%29' stroke-width='2' linecap='round' linejoin='round' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
}
</style>
