"use strict";
let test = true ;

function getImagePath(imageName) {
  return 'assets/images/' + imageName;
}


// Carousel 

document.addEventListener("DOMContentLoaded", (onmouseenter) => {
  const myCarouselElement = document.querySelector('#carouselExampleCaptions');
  const carousel = new bootstrap.Carousel(myCarouselElement, {
    interval: 4000,
    wrap: true
  });
});



//-----------------------------------------------------------------------------------//
//----------------------         SVG                           -------------------------//
//-----------------------------------------------------------------------------------//


function getRandomInt(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

function getRandomColor() {
  var letters = '0123456789ABCDEF';
  var color = '#';
  for (var i = 0; i < 6; i++) {
      color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}

function generateRandomSVG() {
  var svg = '<svg width="100" height="100">';

  for (var i = 0; i < 10; i++) {
      var radius = getRandomInt(5, 50);
      var color = getRandomColor();
      svg += '<circle cx="50" cy="50" r="' + radius + '" fill="' + color + '" />';
  }

  svg += '</svg>';
  return svg;
}
let randomSVG; // Déclaration de la variable au niveau global

function generateRandomSVG() {
  var svg = '<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100">';
  
  for (var i = 0; i < 10; i++) {
    var radius = getRandomInt(5, 50);
    var color = getRandomColor();
    svg += '<circle cx="50" cy="50" r="' + radius + '" fill="' + color + '" />';
  }
  
  svg += '</svg>';
  return svg;
}


// Utilisation de la variable à l'intérieur d'une fonction
function setProfileImage() {
  randomSVG = generateRandomSVG();
  console.log(randomSVG);
  
  
  document.getElementById('photoDeProfil').src = 'data:image/svg+xml,' + encodeURIComponent(randomSVG);
};

// Appel de la fonction pour définir l'image de profil
setProfileImage();

//----------------------------------------------------------------------------------------------------//
//---------------------------------------- Categories ---------------------------------------//
//----------------------------------------------------------------------------------------------------//

var categoryItems = document.getElementsByClassName('category-item');
var firstCategoryItem = document.getElementById('category-item-1');


document.addEventListener("DOMContentLoaded", function() {
  let images = document.querySelectorAll(".category-image");

  images.forEach(image => {
      image.addEventListener('click', function(e) {
          e.target.classList.toggle("active");
      });
  });
});

