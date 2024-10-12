<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="./../assets/js/gsap.js"></script>
  <script src="./../assets/js/ScrollTrigger.js"></script>
  <link rel="stylesheet" href="./../assets/css/swiper-bundle.css">
  <script src="./../assets/js/swiper-bundle.js"></script>
  <script src="./../assets/js/tailwindcss.js"></script>

  <link rel="shortcut icon" type="image/x-icon" href="../assets/img/icon2.png" />

  <title>Consultario Beatriz Fagundez</title>
</head>
<style>
* {
  scroll-behavior: smooth;
}
.img-container-dog {
  width: 100px;
  height: 100px;
}
.img-dog {
  transform: translateX(200%) rotate(50deg);
  width: 100%;
  height: 400px;
}
/* Swiper  */
.swiper {
  width: 100%;
  height: 500px;
}
.img-carousel {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.icon-service {
  width: 100px;
  height: 100px;
}
.card-service {
  transform: translateX(600px);
}
.container-register {
  opacity: 0;
  transform: translateY(-50px);
}
.icon-social {
  width: 50px;
  height: 50px;
}
/* Card  */
.card {
  position: relative;
  width: 300px;
  height: 200px;
  background-color: #f2f2f2;
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
  perspective: 1000px;
  box-shadow: 0 0 0 5px #ffffff80;
  transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}
.card img {
  width: 100px;
  fill: #333;
  transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}
.card:hover {
  transform: scale(1.05);
  box-shadow: 0 8px 16px rgba(255, 255, 255, 0.2);
}
.card__content {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  padding: 20px;
  box-sizing: border-box;
  background-color: #f2f2f2;
  transform: rotateX(-90deg);
  transform-origin: bottom;
  transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}
.card:hover .card__content {
  transform: rotateX(0deg);
}
.card__title {
  margin: 0;
  font-size: 24px;
  color: #333;
  font-weight: 700;
}
.card:hover img {
  scale: 0;
}
.card__description {
  margin: 10px 0 0;
  font-size: 14px;
  color: #777;
  line-height: 1.4;
}
</style>
<body>
  <header class="bg-white">
    <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
      <div class="flex lg:flex-1">
        <a href="./home.php" class="-m-1.5 p-1.5">
          <span class="sr-only">Vetdog</span>
          <img class="h-8 w-auto" src="./../assets/icons/TeenyiconsPawSolid.svg" alt="">
        </a>
      </div>
      <div class="flex lg:hidden">
        <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
          <span class="sr-only">Menu</span>
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
        </button>
      </div>
      <div class="hidden lg:flex lg:gap-x-12">
        <a href="#services" class="text-sm font-semibold leading-6 text-gray-900">Servicios</a>
        <a href="#footer" class="text-sm font-semibold leading-6 text-gray-900">Redes</a>
        <a href="../../ecommerce_vetdog" class="text-sm font-semibold leading-6 text-gray-900">Tienda Virtual</a>
        <!-- <a href="pages-login.php" class="text-sm font-semibold leading-6 text-gray-900">Administrador</a> -->
      </div>
      <div class="hidden lg:flex lg:flex-1 lg:justify-end">
        <a href="./login.php" class="text-sm font-semibold leading-6 text-gray-900">Iniciar Sesión <span aria-hidden="true">&rarr;</span></a>
      </div>
    </nav>
  </header>

<main>

<!-- Carousel  -->
<section class="swiper">
  <div class="swiper-wrapper">
    <!-- Slides -->
    <div class="swiper-slide"><img class="img-carousel" src="./../assets/img/pet5.jpg"></div>
    <div class="swiper-slide"><img class="img-carousel" src="./../assets/img/pet1.jpg"></div>
    <div class="swiper-slide"><img class="img-carousel" src="./../assets/img/pet2.avif"></div>
    <div class="swiper-slide"><img class="img-carousel" src="./../assets/img/pet3.avif"></div>
    <div class="swiper-slide"><img class="img-carousel" src="./../assets/img/pet4.jpg"></div>
  </div>

  <!-- Pagination -->
  <div class="swiper-pagination"></div>
</section>

<section class="bg-white">
  <h1 class="text-4xl font-bold my-5 text-center">Consultorio Beatriz Fagundez</h1>
  <hr style="border: transparent;" class="my-5">
  
  <!-- Introduction  -->
  <section class="flex mt-5" style="overflow: hidden;">
    <article class="flex-auto w-80 p-3">
      <p class="mt-5 p-1 text-lg leading-loose indent-6">En el Consultario Beatriz Fagundez, entendemos que las mascotas son parte de la familia. Nuestro compromiso es proporcionar un cuidado compasivo y experto para mantener a tus fieles compañeros felices y saludables. Desde consultas médicas hasta servicios de emergencia, estamos aquí para apoyarte en cada etapa de la vida de tu mascota.</p>
    </article>
    <article class="flex-auto w-20 p-3">
      <img class="object-cover img-dog" src="./../assets/img/pet6.jpg">
    </article>
  </section>

  <hr style="border: transparent;" class="my-5">

  <!-- Services  -->
  <section id="services">
    <h2 class="text-3xl font-bold my-5 text-center">Ofrecemos Los Siguientes Servicios</h2>

    <section class="flex flex-col mt-5 p-5 container-services" style="overflow: hidden;user-select: none;">
      <article class="grid p-5 items-center justify-items-center ">
        <div class="flex gap-8">
          <div class="card card-service">
            <img class="icon-service" src="./../assets/icons/MaterialSymbolsVaccinesOutlineRounded.svg" alt="Vacunas">
            <div class="card__content">
              <p class="card__title">Vacuna</p>
              <p class="card__description">Protege a tu mascota con nuestro plan de vacunación. Calendario personalizado según su edad y estado de salud. ¡Mantén a tu compañero sano y feliz!</p>
            </div>
          </div>

          <div class="card card-service">
            <img class="icon-service" src="./../assets/icons/UitShieldPlus.svg" alt="Desparasitasion">
            <div class="card__content">
              <p class="card__title">Desparasitación</p>
              <p class="card__description">Nuestros servicios de desparasitación protegen a tu mascota de parásitos internos y externos. Calendario adaptado según edad y salud. ¡Mantén a tu compañero sano!</p>
            </div>
          </div>

          <div class="card card-service">
            <img class="icon-service" src="./../assets/icons/GameIconsScalpel.svg" alt="Cirugia">
            <div class="card__content">
              <p class="card__title">Cirugia Menor</p>
              <p class="card__description">Nuestros servicios de cirugía menor brindamos soluciones cuidadosas y eficientes para el bienestar de tus mascotas. Procedimientos quirúrgicos leves y experimentados. ¡Mantén a tu compañero sano!</p>
            </div>
          </div>
        </div>
      </article>

      <article class="grid p-5 items-center justify-items-center">
        <div class="flex gap-4">
          <div class="card card-service">
            <img class="icon-service" src="./../assets/icons/StreamlineTravelWafinderSinkWashCleanToiletBathroomWater.svg" alt="Limpieza">
            <div class="card__content">
              <p class="card__title">Limpieza</p>
              <p class="card__description">Ofrecemos servicios de baño para mascotas con cosmética especializada y eliminación de pelo de muda. ¡Mantén a tu compañero limpio y saludable!</p>
            </div>
          </div>
          
          <div class="card card-service">
            <img class="icon-service" src="./../assets/icons/RiScissors2Fill.svg" alt="Corte de pelo">
            <div class="card__content">
              <p class="card__title">Corte De Pelo</p>
              <p class="card__description">En nuestra peluquería canina ofrecemos cortes de pelo, stripping, baño y cepillado. ¡Mantén a tu mascota con un aspecto saludable y atractivo!</p>
            </div>
          </div>
        </div>
      </article>
    </section>

  </section>

  <!-- Register Button  -->
  <section class="grid items-center justify-items-center my-5 container-register">
    <h5 class="my-1 p-1 text-md font-medium">¿Quieres continuar?</h5>
    <a href="./login.php" class="bg-cyan-500 p-2 px-4 font-bold rounded-full text-zinc-100 hover:bg-cyan-600">Iniciar Sesión</a>
    <h5 class="my-1 p-1 text-md font-medium">¿Quieres ir a la Tienda Virtual?</h5>
    <a href="../../ecommerce_vetdog" class="bg-cyan-500 p-2 px-4 font-bold rounded-full text-zinc-100 hover:bg-cyan-600">Tienda Virtual</a>
  </section>

  <hr class="mt-5" style="margin: 200px auto 50px auto;">
</section>
</main>

<footer class="bg-white" id="footer">
  <h5 class="text-center font-medium text-xl">Siguenos en nuestras redes sociales</h5>
  <section class="flex flex-col">
    <div class="p-2 mx-auto mt-2">
      <ul class="flex gap-2">
        <li class="flex flex-col items-center p-5">
          <p class="font-medium mb-1">Facebook</p>
          <img class="icon-social" src="./../assets/icons/MdiFacebook.svg" alt="Corte de pelo">
        </li>
        <li class="flex flex-col items-center p-5">
          <p class="font-medium mb-1">X</p>
          <img class="icon-social" src="./../assets/icons/IconoirX.svg" alt="Corte de pelo">
        </li>
        <li class="flex flex-col items-center p-5">
          <p class="font-medium mb-1">Youtube</p>
          <img class="icon-social" src="./../assets/icons/MdiYoutube.svg" alt="Corte de pelo">
        </li>
        <li class="flex flex-col items-center p-5">
          <p class="font-medium mb-1">Instagram</p>
          <img class="icon-social" src="./../assets/icons/MdiInstagram.svg" alt="Corte de pelo">
        </li>
      </ul>
    </div>

    <div class="">
      <h6 class="font-bold mb-2 text-center">Venezuela, Aragua, La Victoria | &copy; Derechos reservados | 2024</h6>
    </div>
    
  </section>
</footer>
<script>
//* Swiper 
const swiper = new Swiper('.swiper', {
  // Optional parameters
  direction: 'horizontal',
  loop: true,
  autoplay: {
    delay: 4000,
  },

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  // And if we need scrollbar
  scrollbar: {
    el: '.swiper-scrollbar',
  },
});

//* GSAP 
gsap.registerPlugin(ScrollTrigger);

const tl = gsap.timeline({
  scrollTrigger: {
    trigger: '.img-dog',
    start: 'top 100%',
    end: 'bottom 90%',
    scrub: true,
  }
});

tl.to('.img-dog', {
  x: 0,
  rotation: 0,
  duration: 2,
});

//? services
const tl2 = gsap.timeline({
  scrollTrigger: {
    trigger: '.container-services',
    start: 'top 60%',
    // end: 'bottom 90%',
    // scrub: true
  }
});

tl2.to('.card-service', {
  x: 0,
  rotation: 0,
  duration: 1,
});

//? btn register
const tl3 = gsap.timeline({
  scrollTrigger: {
    trigger: '.container-register',
    start: 'top 60%',
    // end: 'bottom 90%',
    // scrub: true
  }
});

tl3.to('.container-register', {
  y: 0,
  opacity: 1,
  duration: 2,
});


</script>
</body>
</html>