<template>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    
    <div class="header -flex flex-column ">
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
            <li class="me-3"><a href="#"><font-awesome-icon :icon="['fas', 'user']" /></a></li>
            <li class="me-3">|</li>
            <li class="me-3"><a href="#"><font-awesome-icon :icon="['fas', 'shopping-basket']" /></a></li>
       
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
  .me-3 {
    color: white;
    font-size: 1.1rem;
  }
  .me-3 a{
    color: white;
  }
  .me-3 a:hover{
    color: rgb(157, 157, 157);
    transition: all 0.3s ;

  }

  .navbar-nav .nav-link {
      color: white;
      font-size: 1.1rem;
      font-family: 'Bebas Neue', sans-serif;
      padding: 10px 20px;
      margin-right: 5rem;
    }
   

  
  
  </style>
  