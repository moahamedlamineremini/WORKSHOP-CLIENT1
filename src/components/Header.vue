<template>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    
    <div class="header">
      <nav class="navbar navbar-expand-lg navbar-dark">
        <img src="../assets/logo_metroid.webp" class="logo navbar-brand">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="#">PERSONNALISATION</a></li>
            <li class="nav-item"><a class="nav-link" href="#">PS-VITA</a></li>
            <li class="nav-item"><a class="nav-link" href="#">EDITION LIMITÉES</a></li>
            <li class="nav-item"><a class="nav-link" href="#">ACCESSOIRES</a></li>
            <li class="nav-item"><a class="nav-link" href="#">FOND D'ÉCRAN</a></li>
          </ul>
        </div>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="list-unstyled d-flex">
            <li class="me-3"><a href="#"><font-awesome-icon :icon="['fab', 'user']" /></a></li>
            <li class="me-3"><a href="#"><font-awesome-icon :icon="['fab', 'twitter']" /></a></li>
            <li class="me-3"><a href="#"><font-awesome-icon :icon="['fab', 'tiktok']" /></a></li>
            <li><a href="#"><font-awesome-icon :icon="['fab', 'instagram']" /></a></li>
          </ul>
        </div>

      </nav>
    </div>
  </template>
  
  <style scoped>
    .header {
      background-color: #1e0033;
      padding: 10px;
    }
  
    .logo {
      max-width: 10rem;
      height: auto;
    }
  
    .navbar-nav .nav-link {
      color: white;
      font-size: 1.1rem;
      font-family: 'Bebas Neue', sans-serif;
      padding: 10px 20px;
      margin-right: 5rem;
    }
  
    .navbar-nav .nav-link:hover {
      color: #f0a500;
    }
  </style>
  