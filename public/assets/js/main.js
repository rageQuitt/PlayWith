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

//-------------------------------------------------------------------//
//---------------------    AJAX - Cart/test       --------------------//
//-------------------------------------------------------------------//

var paniers = {}; 

// Dès que la page est complètement chargée, cette fonction sera appelée.
document.addEventListener("DOMContentLoaded", function() {
  // Charger les données du panier à partir du localStorage
  paniers = JSON.parse(localStorage.getItem('paniers')) || {};

  // Ajout au panier
  var boutonsAjouterPanier = document.querySelectorAll("[id^='ajouterPanier']");
  boutonsAjouterPanier.forEach(function(bouton) {
    var productId = bouton.id.replace("ajouterPanier", "");
    paniers[productId] = paniers[productId] || 0;
    bouton.addEventListener("click", function() {
      paniers[productId]++;
      var panierValueElement = document.getElementById("panierValue" + productId);
      panierValueElement.innerText = paniers[productId];
      fetch('/ajouter-au-panier/' + productId, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ quantity: paniers[productId] }),
    })
    .then(function(response) {   // Première fonction de rappel
        console.log("Response", response);
    
        if (!response.ok) {
          throw new Error("Erreur HTTP, statut = " + response.status);
        }
    
        // Convertit la réponse en JSON.
        // Cela retourne une nouvelle Promesse.
        return response.json();
    })
    .then(function(data) {   // Deuxième fonction de rappel
        // Cette fonction est appelée lorsque la Promesse du dessus est résolue.
        // Les données JSON de la réponse sont passées en argument.
        console.log("Data", data);
    
        // Le reste de votre code...
    })
      .catch(function(error) {
        console.error(error);
      });
    });
  });

  // Retrait du panier
  var boutonsRetirerPanier = document.querySelectorAll("[id^='retirerPanier']");
  boutonsRetirerPanier.forEach(function(bouton) {
    var productId = bouton.id.replace("retirerPanier", "");
    bouton.addEventListener("click", function() {
      if (paniers[productId] > 0) {
        paniers[productId]--;
        var panierValueElement = document.getElementById("panierValue" + productId);
        panierValueElement.innerText = paniers[productId];
        fetch('/retirer-du-panier/' + productId, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({ quantity: paniers[productId] }),
        })
        .then(function(response) {
          if (!response.ok) {
            throw new Error("Erreur HTTP, statut = " + response.status);
          }
          return response.json();
        })
        .then(function(data) {
          if (data.success) {
            panierValueElement.innerText = paniers[productId];
          }
        })
        .catch(function(error) {
          console.error(error);
        });
      }
    });
  });

  // Confirmation de la commande
  var boutonsConfirmerCommande = document.querySelectorAll("[id^='confirmerCommande']");
  boutonsConfirmerCommande.forEach(function(bouton) {
    var productId = bouton.id.replace("confirmerCommande", "");
    bouton.addEventListener("click", function() {
      var url = '/confirmer-commande/' + 1 + '/' + 50;
      fetch(url, {
        method: 'POST',
      })
      .then(function(response) {
        if (!response.ok) {
          throw new Error("Erreur HTTP, statut = " + response.status);
        }
        return response.json();
      })
      .then(function(data) {
        if (data.success) {
          window.location.href = "/confirmation";
        }
      })
      .catch(function(error) {
        console.error(error);
      });
    });
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
          // Votre code pour l'effet ici.
          // Par exemple, vous pouvez ajouter une classe à l'image:
          e.target.classList.toggle("active");
      });
  });
});

