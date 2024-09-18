<script>
export default {
  name: "typeWiriter",
  data: () => {
    return {
      typeValue: "",
      typeStatus: false,
      displayTextArray: ["Revivez vos classiques améliorés !"],
      typingSpeed: 150,
      erasingSpeed: 100,
      newTextDelay: 2000,
      displayTextArrayIndex: 0,
      charIndex: 0,
    };
  },
  props: {},
  created() {
    setTimeout(this.typeText, this.newTextDelay + 200);
  },
  methods: {
    typeText() {
      if (this.charIndex < this.displayTextArray[this.displayTextArrayIndex].length) {
        if (!this.typeStatus) this.typeStatus = true;
        this.typeValue += this.displayTextArray[this.displayTextArrayIndex].charAt(
          this.charIndex
        );
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
        this.typeValue = this.displayTextArray[this.displayTextArrayIndex].substring(
          0,
          this.charIndex - 1
        );
        this.charIndex -= 1;
        setTimeout(this.eraseText, this.erasingSpeed);
      } else {
        this.typeStatus = false;
        this.displayTextArrayIndex += 1;
        if (this.displayTextArrayIndex >= this.displayTextArray.length)
          this.displayTextArrayIndex = 0;
        setTimeout(this.typeText, this.typingSpeed + 1000);
      }
    },
  },
};

  </script>
<template>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

<div class="acceuil_section">
    <section class="container text-center">
        <h1> RETROMETROID
<br>
      <span class="typed-text">{{ typeValue }}</span>
      <span class="blinking-cursor">|</span>
      <span class="cursor" :class="{ typing: typeStatus }">&nbsp;</span>
</h1>
    </section>

    <section class="ps-vita">
      <h2>DE NOUVELLES POSSIBILITÉS</h2>
      <!-- Contenu PS Vita ici -->
    </section>

    <section class="customisation">
      <h2>CUSTOMISATION</h2>
      <!-- Contenu Customisation ici -->
    </section>

    <section class="edition-limitees">
      <h2>ÉDITION LIMITÉES</h2>
      <!-- Contenu des éditions limitées ici -->
    </section>
</div>

</template>
<style>
.container h1{
    font-family:"Press Start 2P", system-ui;
    color: #fff;
}
.acceuil_section{
    min-height: 100vh;
  background-image: url("../assets/img_acceuil.png");
  background-size: cover;
  background-position: center;
  overflow: hidden; 
}
.container {
  width: 100%;
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
  font-size: 6rem;
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
</style>