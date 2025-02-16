<template>
  <div class="header -flex flex-column">
    <nav class="navbar navbar-expand-lg navbar-dark">
      
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              PERSONNALISATION
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="">
              <router-link class="dropdown-item" to="/produit" style="font-size: 1rem; font-family: bayon,system-ui;">GAMEBOY DMG</router-link>
              
            </div>
          </li>

          <!-- Other menu items -->
          <li class="nav-item">
            <router-link class="nav-link"  to="/produit" >PS-VITA</router-link>
            </li>
          <li class="nav-item"><a class="nav-link" href="#">EDITION LIMITÉES</a></li>
          <li class="nav-item"><a class="nav-link" href="#">ACCESSOIRES</a></li>
          <li class="nav-item"><a class="nav-link" href="#">FOND D'ÉCRAN</a></li>
        </ul>
      </div>

      <!-- Icons Section -->
      <div class="d-flex">
        <ul class="list-unstyled d-flex">
          <li class="me-3">
            <a href="#"><font-awesome-icon :icon="['fas', 'user']" /></a>
          </li>
          <li class="me-3">|</li>
          <li class="me-3">
            <a href="#"><font-awesome-icon :icon="['fas', 'shopping-basket']" /></a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</template>

<style scoped>
.header {
  background-color: #18033B;
  padding: 10px;
}

.logo {
  max-width: 10rem;
  height: auto;
}

.me-3 {
  color: white;
  font-size: 1.1rem;
}

.me-3 a {
  color: white;
}

.me-3 a:hover {
  color: rgb(157, 157, 157);
  transition: all 0.3s;
}

.navbar-nav .nav-link {
  color: white;
  font-size: 1.1rem;
  font-family: 'Bebas Neue', sans-serif;
  padding: 10px 20px;
  margin-right: 5rem;
  position: relative;
  transition: color 0.3s ease;
}

.navbar-nav .nav-link::after {
  content: "";
  display: block;
  width: 0;
  height: 2px;
  background: white;
  position: absolute;
  left: 50%;
  bottom: 5px;
  transition: width 0.3s ease, left 0.3s ease;
}

.navbar-nav .nav-link:hover::after {
  width: 100%;
  left: 0;
}

.navbar-nav .nav-link:hover {
  color: rgb(200, 200, 200); /* Changement de couleur léger */
}

</style>
