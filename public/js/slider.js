/* JS pour le slider de la page d'accueil visiteur */

/* JS pour le slider de la page d'accueil */

// Défintion de la variable slideIndex

var slideIndex = 0;
showSlides(slideIndex);

// Définition de la variable interval

var interval;

// Fonction de défilement automatique du slider

function plusSlides(n) {
  showSlides(slideIndex += n);
  clearInterval(
    interval
  );
  interval = setInterval(function() {
    showSlides(slideIndex += 1);
  }, 3500);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
  clearInterval(
    interval
  );
  interval = setInterval(function() {
    showSlides(slideIndex += 1);
  }, 3500);
}

// État du slider en mode automatique

function showSlides(n) {
  var slides = document.getElementsByClassName("slider-item");
  if (n > slides.length-1) {slideIndex = 0}
  if (n < 0) {slideIndex = slides.length-1}
  for (var i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slides[slideIndex].style.display = "flex";
}

// Valeur par défaut du temps d'arrêt sur une image du slider en mode manuel

function startSlide() {
  interval = setInterval(function() {
    showSlides(slideIndex += 1);
  }, 3500);
}

// Reset de l'interval si click sur un bouton de défilement

function stopSlide() {
  clearInterval(
    interval
  );
}

// Fonction Stop du slider lorsque la souris est en hover sur une image

$(function() {
  startSlide();
  $('.slider-item IMG').hover(function() {
    stopSlide();
  }, function() {
    startSlide();
  })
});