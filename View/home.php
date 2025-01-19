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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="./home.css">
  <link rel="shortcut icon" type="image/x-icon" href="../assets/img/icon2.png" />
  <title>Consultario Beatriz Fagundez</title>
</head>

<body>
  <header class="bg-white shadow-md">
    <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8">
      <div class="flex lg:flex-1">
        <a href="./home.php" class="-m-1.5 p-1.5 flex items-center">
          <img class="h-20 w-auto mr-2" src="./../assets/img/icon.png" alt="Vetdog Logo">
          <span class="text-lg font-bold text-gray-900">Beatriz Fagundez</span>
        </a>
      </div>
      <div class="flex lg:hidden">
        <button type="button"
          class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700 hover:bg-gray-200 transition duration-200">
          <span class="sr-only">Menu</span>
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
        </button>
      </div>
      <div class="hidden lg:flex lg:gap-x-12">
        <a href="#services"
          class="text-xl font-semibold leading-6 text-gray-900 hover:text-blue-600 transition duration-200">Servicios</a>
        <a href="../../ecommerce_vetdog"
          class="text-xl font-semibold leading-6 text-gray-900 hover:text-blue-600 transition duration-200">Tienda</a>
        <a href="#footer"
          class="text-xl font-semibold leading-6 text-gray-900 hover:text-blue-600 transition duration-200">Contactos</a>


      </div>
      <div class="hidden lg:flex lg:flex-1 lg:justify-end">
        <a href="./login.php"
          class="bg-blue-600 text-white text-xl font-semibold leading-6 px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 hover:shadow-lg transition duration-200">
          Iniciar Sesión <span aria-hidden="true">&rarr;</span>
        </a>
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
      <h1 class="text-4xl font-bold my-5 text-center text-blue-500">Consultorio Beatriz Fagundez</h1>
      <hr style="border: transparent;" class="my-5">

      <!-- Introduction  -->
      <section class="flex mt-5 bg-gradient-to-r from-blue-400 to-blue-600 p-5 rounded-lg shadow-lg text-white"
        style="overflow: hidden;">
        <article class="flex-auto w-1/2 p-5">
          <h2 class="text-2xl font-bold mb-4">¡Bienvenido a Consultorio Beatriz Fagundez!</h2>
          <p class="mt-2 text-lg leading-loose indent-6">
            En nuestro consultorio, entendemos que tus mascotas son parte de tu familia. 🐾
            ¡Estamos aquí para ofrecerles el mejor cuidado! Desde consultas médicas hasta servicios de emergencia,
            nuestro equipo de expertos está comprometido a mantener a tus fieles compañeros felices y saludables.
          </p>
          <br>
          <a href="./login.php"
            class="mt-4 bg-white text-blue-500 font-semibold py-2 px-4 rounded shadow-lg hover:bg-gray-200 transition duration-300">Iniciar
            Sesión</a>
        </article>
        <article class="flex-auto w-1/2 p-3">
          <img class="object-cover img-dog rounded-lg shadow-lg" src="./../assets/img/pet6.jpg" alt="Mascota feliz">
        </article>
      </section>



      <hr style="border: transparent;" class="my-5">

      <!-- Services  -->
      <section id="services">
        <h2 class="text-3xl font-bold my-5 text-center text-blue-500">
          <i class="fas fa-concierge-bell mr-3"></i> Servicios
        </h2>
        <section class="flex flex-wrap mt-5 p-5 container-services" style="overflow: hidden; user-select: none;">
          <div class="flex gap-4 justify-center items-center">
            <div class="card card-service">
              <img class="icon-service" src="./../assets/icons/MaterialSymbolsVaccinesOutlineRounded.svg" alt="Vacunas">
              <div class="card__content">
                <p class="card__title">Vacuna</p>
                <p class="card__description">Protege a tu mascota con nuestro plan de vacunación. Calendario
                  personalizado según su edad y estado de salud. ¡Mantén a tu compañero sano y feliz!</p>
              </div>
            </div>

            <div class="card card-service">
              <img class="icon-service" src="./../assets/icons/UitShieldPlus.svg" alt="Desparasitasion">
              <div class="card__content">
                <p class="card__title">Desparasitación</p>
                <p class="card__description">Nuestros servicios de desparasitación protegen a tu mascota de parásitos
                  internos y externos. Calendario adaptado según edad y salud. ¡Mantén a tu compañero sano!</p>
              </div>
            </div>

            <div class="card card-service">
              <img class="icon-service" src="./../assets/icons/GameIconsScalpel.svg" alt="Cirugia">
              <div class="card__content">
                <p class="card__title">Cirugia Menor</p>
                <p class="card__description">Nuestros servicios de cirugía menor brindamos soluciones cuidadosas y
                  eficientes para el bienestar de tus mascotas. Procedimientos quirúrgicos leves y experimentados.</p>
              </div>
            </div>

            <div class="card card-service">
              <img class="icon-service"
                src="./../assets/icons/StreamlineTravelWafinderSinkWashCleanToiletBathroomWater.svg" alt="Limpieza">
              <div class="card__content">
                <p class="card__title">Limpieza</p>
                <p class="card__description">Ofrecemos servicios de baño para mascotas con cosmética especializada y
                  eliminación de pelo de muda. ¡Mantén a tu compañero limpio y saludable!</p>
              </div>
            </div>

            <div class="card card-service">
              <img class="icon-service" src="./../assets/icons/RiScissors2Fill.svg" alt="Corte de pelo">
              <div class="card__content">
                <p class="card__title">Corte De Pelo</p>
                <p class="card__description">En nuestra peluquería canina ofrecemos cortes de pelo, stripping, baño y
                  cepillado. ¡Mantén a tu mascota con un aspecto saludable y atractivo!</p>
              </div>
            </div>
          </div>
        </section>
      </section>



      <!-- Products -->
      <section id="products">
        <h2 class="text-3xl font-bold my-5 text-center text-blue-500">
          <i class="fas fa-box mr-3"></i> Productos
        </h2>

        <section class="flex flex-wrap mt-5 p-5 container-products" style="overflow: hidden; user-select: none;">
          <div class="flex gap-4 justify-center items-center">
            <div class="card card-product">
              <img class="icon-product" src="./../assets/img/subidas/Cepillo.jpg" alt="Producto 1"
                style="height: 100%; width: 100%; margin: 0;">
              <div class="card__content">
                <p class="card__title">Cepillo Desenredante para Perros y Gatos "PetCare"</p>
              </div>
            </div>

            <div class="card card-product">
              <img class="icon-product" src="./../assets/img/subidas/Correa.jpg" alt="Producto 2"
                style="height: 100%; width: 100%; margin: 0;">
              <div class="card__content">
                <p class="card__title">Correa Extensible para Perros (5m)</p>

              </div>
            </div>

            <div class="card card-product">
              <img class="icon-product" src="./../assets/img/subidas/collar1.jpeg" alt="Producto 3"
                style="height: 100%; width: 100%; margin: 0;">
              <div class="card__content">
                <p class="card__title">Julius K9 Collar Adiestramiento Cordino</p>


              </div>
            </div>

            <div class="card card-product">
              <img class="icon-product" src="./../assets/img/subidas/Arena.jpg" alt="Producto 4"
                style="height: 100%; width: 100%; margin: 0;">
              <div class="card__content">
                <p class="card__title">Arena para Gatos "CleanPaws" (10kg)</p>


              </div>
            </div>

            <div class="card card-product">
              <img class="icon-product" src="./../assets/img/subidas/snac.jpg" alt="Producto 5"
                style="height: 100%; width: 100%; margin: 0;">
              <div class="card__content">
                <p class="card__title">Apetitus Galletas Vainilla Biscuits</p>

              </div>
            </div>
          </div>
        </section>
      </section>

      <style>

      </style>


      <!-- Register Button  -->
      <section class="grid items-center justify-items-center my-5 container-register">
        <h5 class="my-1 p-1 text-md font-medium">¡Visita nuestra Tienda Virtual!</h5>
        <a href="../../ecommerce_vetdog"
          class="bg-cyan-500 p-2 px-4 font-bold rounded-full text-zinc-100 hover:bg-cyan-600">Tienda Virtual</a>
      </section>

      <hr class="mt-5" style="margin: 20px auto 50px auto;">
    </section>
  </main>

  <footer class="footer-wrapper">
    <div class="footer-content bg-white">
      <h5 class="text-center font-medium text-xl mb-4">Síguenos en nuestras redes sociales</h5>
      <section class="social-section flex flex-col">
        <div class="p-2 mx-auto mt-2">
          <ul class="flex justify-center gap-10">
            <li class="flex flex-col items-center">
              <img class="icon-social" src="./../assets/icons/MdiFacebook.svg" alt="Facebook">
              <p class="font-medium mt-1">Facebook</p>
            </li>
            <li class="flex flex-col items-center">
              <img class="icon-social" src="./../assets/icons/IconoirX.svg" alt="X">
              <p class="font-medium mt-1">X</p>
            </li>
            <li class="flex flex-col items-center">
              <img class="icon-social" src="./../assets/icons/MdiYoutube.svg" alt="YouTube">
              <p class="font-medium mt-1">YouTube</p>
            </li>
            <li class="flex flex-col items-center">
              <img class="icon-social" src="./../assets/icons/MdiInstagram.svg" alt="Instagram">
              <p class="font-medium mt-1">Instagram</p>
            </li>
          </ul>
        </div>
      </section>
    </div>
    <div class="footer-bottom bg-gray-200 py-4">
      <h6 class="font-bold text-center text-sm">Venezuela, Aragua, La Victoria | &copy; Derechos reservados | 2024</h6>
    </div>
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