function classToggle() {
    var el = document.querySelector('.icon-cards__content');
    el.classList.toggle('step-animation');
  }
  
  document.querySelector('#toggle-animation').addEventListener('click', classToggle);


  let currentRotation = 0;
const carousel = document.querySelector('.icon-cards__content');

function rotateCarousel() {
  if (currentRotation === 270) {
    currentRotation = -90;
  } else {
    currentRotation += 90;
  }
  carousel.style.transform = `translateZ(-35vw) rotateY(${currentRotation}deg)`;
}

setInterval(rotateCarousel, 2500); // Ajusta el intervalo a la duración deseada para cada rotación