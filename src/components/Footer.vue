<template>
    <footer class="bg-dark text-white pt-4 mt-auto">
        <div class="container">
            <div class="row text-center text-md-start">
                <!-- Follow Us Section -->
                <div class="col-md-4 mb-4">
                    <img src="../assets/logo_metroid.webp" alt="Logo Metroid" class="img-fluid mb-3">
                    <h3>Suivez-nous</h3>
                    <ul class="list-unstyled d-flex justify-content-center justify-content">
                        <li class="me-3"><a href="#"><font-awesome-icon :icon="['fab', 'facebook']" /></a></li>
                        <li class="me-3"><a href="#"><font-awesome-icon :icon="['fab', 'twitter']" /></a></li>
                        <li class="me-3"><a href="#"><font-awesome-icon :icon="['fab', 'tiktok']" /></a></li>
                        <li><a href="#"><font-awesome-icon :icon="['fab', 'instagram']" /></a></li>
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
    </footer>
</template>

<style scoped>
footer {
    background-color: #000;
    width: 100%;
    padding: 2rem 0;
    bottom: 0;
    left: 0;
}
h3{
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
</style>