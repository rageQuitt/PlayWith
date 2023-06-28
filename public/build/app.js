"use strict";
(self["webpackChunkmy_project_directory"] = self["webpackChunkmy_project_directory"] || []).push([["app"],{

/***/ "./public/assets/js/main.js":
/*!**********************************!*\
  !*** ./public/assets/js/main.js ***!
  \**********************************/
/***/ (() => {



var test = true;
function getImagePath(imageName) {
  return 'assets/images/' + imageName;
}

// Carousel 

document.addEventListener("DOMContentLoaded", function (onmouseenter) {
  var myCarouselElement = document.querySelector('#carouselExampleCaptions');
  var carousel = new bootstrap.Carousel(myCarouselElement, {
    interval: 4000,
    wrap: true
  });
});

//-------------------------------------------------------------------//
//---------------------    AJAX - Cart/test       --------------------//
//-------------------------------------------------------------------//

var paniers = {};

// Dès que la page est complètement chargée, cette fonction sera appelée.
document.addEventListener("DOMContentLoaded", function () {
  // Charger les données du panier à partir du localStorage
  paniers = JSON.parse(localStorage.getItem('paniers')) || {};

  // Ajout au panier
  var boutonsAjouterPanier = document.querySelectorAll("[id^='ajouterPanier']");
  boutonsAjouterPanier.forEach(function (bouton) {
    var productId = bouton.id.replace("ajouterPanier", "");
    paniers[productId] = paniers[productId] || 0;
    bouton.addEventListener("click", function () {
      paniers[productId]++;
      var panierValueElement = document.getElementById("panierValue" + productId);
      panierValueElement.innerText = paniers[productId];
      fetch('/ajouter-au-panier/' + productId, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          quantity: paniers[productId]
        })
      }).then(function (response) {
        // Première fonction de rappel
        console.log("Response", response);
        if (!response.ok) {
          throw new Error("Erreur HTTP, statut = " + response.status);
        }

        // Convertit la réponse en JSON.
        // Cela retourne une nouvelle Promesse.
        return response.json();
      }).then(function (data) {
        // Deuxième fonction de rappel
        // Cette fonction est appelée lorsque la Promesse du dessus est résolue.
        // Les données JSON de la réponse sont passées en argument.
        console.log("Data", data);

        // Le reste de votre code...
      })["catch"](function (error) {
        console.error(error);
      });
    });
  });

  // Retrait du panier
  var boutonsRetirerPanier = document.querySelectorAll("[id^='retirerPanier']");
  boutonsRetirerPanier.forEach(function (bouton) {
    var productId = bouton.id.replace("retirerPanier", "");
    bouton.addEventListener("click", function () {
      if (paniers[productId] > 0) {
        paniers[productId]--;
        var panierValueElement = document.getElementById("panierValue" + productId);
        panierValueElement.innerText = paniers[productId];
        fetch('/retirer-du-panier/' + productId, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            quantity: paniers[productId]
          })
        }).then(function (response) {
          if (!response.ok) {
            throw new Error("Erreur HTTP, statut = " + response.status);
          }
          return response.json();
        }).then(function (data) {
          if (data.success) {
            panierValueElement.innerText = paniers[productId];
          }
        })["catch"](function (error) {
          console.error(error);
        });
      }
    });
  });

  // Confirmation de la commande
  var boutonsConfirmerCommande = document.querySelectorAll("[id^='confirmerCommande']");
  boutonsConfirmerCommande.forEach(function (bouton) {
    var productId = bouton.id.replace("confirmerCommande", "");
    bouton.addEventListener("click", function () {
      var url = '/confirmer-commande/' + 1 + '/' + 50;
      fetch(url, {
        method: 'POST'
      }).then(function (response) {
        if (!response.ok) {
          throw new Error("Erreur HTTP, statut = " + response.status);
        }
        return response.json();
      }).then(function (data) {
        if (data.success) {
          window.location.href = "/confirmation";
        }
      })["catch"](function (error) {
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
var randomSVG; // Déclaration de la variable au niveau global

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
}
;

// Appel de la fonction pour définir l'image de profil
setProfileImage();

//----------------------------------------------------------------------------------------------------//
//---------------------------------------- Categories ---------------------------------------//
//----------------------------------------------------------------------------------------------------//

var categoryItems = document.getElementsByClassName('category-item');
var firstCategoryItem = document.getElementById('category-item-1');
document.addEventListener("DOMContentLoaded", function () {
  var images = document.querySelectorAll(".category-image");
  images.forEach(function (image) {
    image.addEventListener('click', function (e) {
      // Votre code pour l'effet ici.
      // Par exemple, vous pouvez ajouter une classe à l'image:
      e.target.classList.toggle("active");
    });
  });
});

/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ var __webpack_exports__ = (__webpack_exec__("./public/assets/js/main.js"));
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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LENBQUMsQ0FBQ0MsTUFBTSxDQUFDQyxTQUFTLENBQUNDLE1BQU0sQ0FBQyxRQUFRLENBQUM7SUFDdkMsQ0FBQyxDQUFDO0VBQ04sQ0FBQyxDQUFDO0FBQ0osQ0FBQyxDQUFDIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vbXlfcHJvamVjdF9kaXJlY3RvcnkvLi9wdWJsaWMvYXNzZXRzL2pzL21haW4uanMiXSwic291cmNlc0NvbnRlbnQiOlsiXCJ1c2Ugc3RyaWN0XCI7XG5sZXQgdGVzdCA9IHRydWUgO1xuXG5mdW5jdGlvbiBnZXRJbWFnZVBhdGgoaW1hZ2VOYW1lKSB7XG4gIHJldHVybiAnYXNzZXRzL2ltYWdlcy8nICsgaW1hZ2VOYW1lO1xufVxuXG5cbi8vIENhcm91c2VsIFxuXG5kb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKFwiRE9NQ29udGVudExvYWRlZFwiLCAob25tb3VzZWVudGVyKSA9PiB7XG4gIGNvbnN0IG15Q2Fyb3VzZWxFbGVtZW50ID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignI2Nhcm91c2VsRXhhbXBsZUNhcHRpb25zJyk7XG4gIGNvbnN0IGNhcm91c2VsID0gbmV3IGJvb3RzdHJhcC5DYXJvdXNlbChteUNhcm91c2VsRWxlbWVudCwge1xuICAgIGludGVydmFsOiA0MDAwLFxuICAgIHdyYXA6IHRydWVcbiAgfSk7XG59KTtcblxuLy8tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLy9cbi8vLS0tLS0tLS0tLS0tLS0tLS0tLS0tICAgIEFKQVggLSBDYXJ0L3Rlc3QgICAgICAgLS0tLS0tLS0tLS0tLS0tLS0tLS0vL1xuLy8tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLy9cblxudmFyIHBhbmllcnMgPSB7fTsgXG5cbi8vIETDqHMgcXVlIGxhIHBhZ2UgZXN0IGNvbXBsw6h0ZW1lbnQgY2hhcmfDqWUsIGNldHRlIGZvbmN0aW9uIHNlcmEgYXBwZWzDqWUuXG5kb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKFwiRE9NQ29udGVudExvYWRlZFwiLCBmdW5jdGlvbigpIHtcbiAgLy8gQ2hhcmdlciBsZXMgZG9ubsOpZXMgZHUgcGFuaWVyIMOgIHBhcnRpciBkdSBsb2NhbFN0b3JhZ2VcbiAgcGFuaWVycyA9IEpTT04ucGFyc2UobG9jYWxTdG9yYWdlLmdldEl0ZW0oJ3BhbmllcnMnKSkgfHwge307XG5cbiAgLy8gQWpvdXQgYXUgcGFuaWVyXG4gIHZhciBib3V0b25zQWpvdXRlclBhbmllciA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoXCJbaWRePSdham91dGVyUGFuaWVyJ11cIik7XG4gIGJvdXRvbnNBam91dGVyUGFuaWVyLmZvckVhY2goZnVuY3Rpb24oYm91dG9uKSB7XG4gICAgdmFyIHByb2R1Y3RJZCA9IGJvdXRvbi5pZC5yZXBsYWNlKFwiYWpvdXRlclBhbmllclwiLCBcIlwiKTtcbiAgICBwYW5pZXJzW3Byb2R1Y3RJZF0gPSBwYW5pZXJzW3Byb2R1Y3RJZF0gfHwgMDtcbiAgICBib3V0b24uYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsIGZ1bmN0aW9uKCkge1xuICAgICAgcGFuaWVyc1twcm9kdWN0SWRdKys7XG4gICAgICB2YXIgcGFuaWVyVmFsdWVFbGVtZW50ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoXCJwYW5pZXJWYWx1ZVwiICsgcHJvZHVjdElkKTtcbiAgICAgIHBhbmllclZhbHVlRWxlbWVudC5pbm5lclRleHQgPSBwYW5pZXJzW3Byb2R1Y3RJZF07XG4gICAgICBmZXRjaCgnL2Fqb3V0ZXItYXUtcGFuaWVyLycgKyBwcm9kdWN0SWQsIHtcbiAgICAgICAgbWV0aG9kOiAnUE9TVCcsXG4gICAgICAgIGhlYWRlcnM6IHtcbiAgICAgICAgICAnQ29udGVudC1UeXBlJzogJ2FwcGxpY2F0aW9uL2pzb24nLFxuICAgICAgICB9LFxuICAgICAgICBib2R5OiBKU09OLnN0cmluZ2lmeSh7IHF1YW50aXR5OiBwYW5pZXJzW3Byb2R1Y3RJZF0gfSksXG4gICAgfSlcbiAgICAudGhlbihmdW5jdGlvbihyZXNwb25zZSkgeyAgIC8vIFByZW1pw6hyZSBmb25jdGlvbiBkZSByYXBwZWxcbiAgICAgICAgY29uc29sZS5sb2coXCJSZXNwb25zZVwiLCByZXNwb25zZSk7XG4gICAgXG4gICAgICAgIGlmICghcmVzcG9uc2Uub2spIHtcbiAgICAgICAgICB0aHJvdyBuZXcgRXJyb3IoXCJFcnJldXIgSFRUUCwgc3RhdHV0ID0gXCIgKyByZXNwb25zZS5zdGF0dXMpO1xuICAgICAgICB9XG4gICAgXG4gICAgICAgIC8vIENvbnZlcnRpdCBsYSByw6lwb25zZSBlbiBKU09OLlxuICAgICAgICAvLyBDZWxhIHJldG91cm5lIHVuZSBub3V2ZWxsZSBQcm9tZXNzZS5cbiAgICAgICAgcmV0dXJuIHJlc3BvbnNlLmpzb24oKTtcbiAgICB9KVxuICAgIC50aGVuKGZ1bmN0aW9uKGRhdGEpIHsgICAvLyBEZXV4acOobWUgZm9uY3Rpb24gZGUgcmFwcGVsXG4gICAgICAgIC8vIENldHRlIGZvbmN0aW9uIGVzdCBhcHBlbMOpZSBsb3JzcXVlIGxhIFByb21lc3NlIGR1IGRlc3N1cyBlc3QgcsOpc29sdWUuXG4gICAgICAgIC8vIExlcyBkb25uw6llcyBKU09OIGRlIGxhIHLDqXBvbnNlIHNvbnQgcGFzc8OpZXMgZW4gYXJndW1lbnQuXG4gICAgICAgIGNvbnNvbGUubG9nKFwiRGF0YVwiLCBkYXRhKTtcbiAgICBcbiAgICAgICAgLy8gTGUgcmVzdGUgZGUgdm90cmUgY29kZS4uLlxuICAgIH0pXG4gICAgICAuY2F0Y2goZnVuY3Rpb24oZXJyb3IpIHtcbiAgICAgICAgY29uc29sZS5lcnJvcihlcnJvcik7XG4gICAgICB9KTtcbiAgICB9KTtcbiAgfSk7XG5cbiAgLy8gUmV0cmFpdCBkdSBwYW5pZXJcbiAgdmFyIGJvdXRvbnNSZXRpcmVyUGFuaWVyID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbChcIltpZF49J3JldGlyZXJQYW5pZXInXVwiKTtcbiAgYm91dG9uc1JldGlyZXJQYW5pZXIuZm9yRWFjaChmdW5jdGlvbihib3V0b24pIHtcbiAgICB2YXIgcHJvZHVjdElkID0gYm91dG9uLmlkLnJlcGxhY2UoXCJyZXRpcmVyUGFuaWVyXCIsIFwiXCIpO1xuICAgIGJvdXRvbi5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgZnVuY3Rpb24oKSB7XG4gICAgICBpZiAocGFuaWVyc1twcm9kdWN0SWRdID4gMCkge1xuICAgICAgICBwYW5pZXJzW3Byb2R1Y3RJZF0tLTtcbiAgICAgICAgdmFyIHBhbmllclZhbHVlRWxlbWVudCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKFwicGFuaWVyVmFsdWVcIiArIHByb2R1Y3RJZCk7XG4gICAgICAgIHBhbmllclZhbHVlRWxlbWVudC5pbm5lclRleHQgPSBwYW5pZXJzW3Byb2R1Y3RJZF07XG4gICAgICAgIGZldGNoKCcvcmV0aXJlci1kdS1wYW5pZXIvJyArIHByb2R1Y3RJZCwge1xuICAgICAgICAgIG1ldGhvZDogJ1BPU1QnLFxuICAgICAgICAgIGhlYWRlcnM6IHtcbiAgICAgICAgICAgICdDb250ZW50LVR5cGUnOiAnYXBwbGljYXRpb24vanNvbicsXG4gICAgICAgICAgfSxcbiAgICAgICAgICBib2R5OiBKU09OLnN0cmluZ2lmeSh7IHF1YW50aXR5OiBwYW5pZXJzW3Byb2R1Y3RJZF0gfSksXG4gICAgICAgIH0pXG4gICAgICAgIC50aGVuKGZ1bmN0aW9uKHJlc3BvbnNlKSB7XG4gICAgICAgICAgaWYgKCFyZXNwb25zZS5vaykge1xuICAgICAgICAgICAgdGhyb3cgbmV3IEVycm9yKFwiRXJyZXVyIEhUVFAsIHN0YXR1dCA9IFwiICsgcmVzcG9uc2Uuc3RhdHVzKTtcbiAgICAgICAgICB9XG4gICAgICAgICAgcmV0dXJuIHJlc3BvbnNlLmpzb24oKTtcbiAgICAgICAgfSlcbiAgICAgICAgLnRoZW4oZnVuY3Rpb24oZGF0YSkge1xuICAgICAgICAgIGlmIChkYXRhLnN1Y2Nlc3MpIHtcbiAgICAgICAgICAgIHBhbmllclZhbHVlRWxlbWVudC5pbm5lclRleHQgPSBwYW5pZXJzW3Byb2R1Y3RJZF07XG4gICAgICAgICAgfVxuICAgICAgICB9KVxuICAgICAgICAuY2F0Y2goZnVuY3Rpb24oZXJyb3IpIHtcbiAgICAgICAgICBjb25zb2xlLmVycm9yKGVycm9yKTtcbiAgICAgICAgfSk7XG4gICAgICB9XG4gICAgfSk7XG4gIH0pO1xuXG4gIC8vIENvbmZpcm1hdGlvbiBkZSBsYSBjb21tYW5kZVxuICB2YXIgYm91dG9uc0NvbmZpcm1lckNvbW1hbmRlID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbChcIltpZF49J2NvbmZpcm1lckNvbW1hbmRlJ11cIik7XG4gIGJvdXRvbnNDb25maXJtZXJDb21tYW5kZS5mb3JFYWNoKGZ1bmN0aW9uKGJvdXRvbikge1xuICAgIHZhciBwcm9kdWN0SWQgPSBib3V0b24uaWQucmVwbGFjZShcImNvbmZpcm1lckNvbW1hbmRlXCIsIFwiXCIpO1xuICAgIGJvdXRvbi5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgZnVuY3Rpb24oKSB7XG4gICAgICB2YXIgdXJsID0gJy9jb25maXJtZXItY29tbWFuZGUvJyArIDEgKyAnLycgKyA1MDtcbiAgICAgIGZldGNoKHVybCwge1xuICAgICAgICBtZXRob2Q6ICdQT1NUJyxcbiAgICAgIH0pXG4gICAgICAudGhlbihmdW5jdGlvbihyZXNwb25zZSkge1xuICAgICAgICBpZiAoIXJlc3BvbnNlLm9rKSB7XG4gICAgICAgICAgdGhyb3cgbmV3IEVycm9yKFwiRXJyZXVyIEhUVFAsIHN0YXR1dCA9IFwiICsgcmVzcG9uc2Uuc3RhdHVzKTtcbiAgICAgICAgfVxuICAgICAgICByZXR1cm4gcmVzcG9uc2UuanNvbigpO1xuICAgICAgfSlcbiAgICAgIC50aGVuKGZ1bmN0aW9uKGRhdGEpIHtcbiAgICAgICAgaWYgKGRhdGEuc3VjY2Vzcykge1xuICAgICAgICAgIHdpbmRvdy5sb2NhdGlvbi5ocmVmID0gXCIvY29uZmlybWF0aW9uXCI7XG4gICAgICAgIH1cbiAgICAgIH0pXG4gICAgICAuY2F0Y2goZnVuY3Rpb24oZXJyb3IpIHtcbiAgICAgICAgY29uc29sZS5lcnJvcihlcnJvcik7XG4gICAgICB9KTtcbiAgICB9KTtcbiAgfSk7XG59KTtcblxuLy8tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS8vXG4vLy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0gICAgICAgICBTVkcgICAgICAgICAgICAgICAgICAgICAgICAgICAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLy9cbi8vLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0vL1xuXG5cbmZ1bmN0aW9uIGdldFJhbmRvbUludChtaW4sIG1heCkge1xuICByZXR1cm4gTWF0aC5mbG9vcihNYXRoLnJhbmRvbSgpICogKG1heCAtIG1pbiArIDEpKSArIG1pbjtcbn1cblxuZnVuY3Rpb24gZ2V0UmFuZG9tQ29sb3IoKSB7XG4gIHZhciBsZXR0ZXJzID0gJzAxMjM0NTY3ODlBQkNERUYnO1xuICB2YXIgY29sb3IgPSAnIyc7XG4gIGZvciAodmFyIGkgPSAwOyBpIDwgNjsgaSsrKSB7XG4gICAgICBjb2xvciArPSBsZXR0ZXJzW01hdGguZmxvb3IoTWF0aC5yYW5kb20oKSAqIDE2KV07XG4gIH1cbiAgcmV0dXJuIGNvbG9yO1xufVxuXG5mdW5jdGlvbiBnZW5lcmF0ZVJhbmRvbVNWRygpIHtcbiAgdmFyIHN2ZyA9ICc8c3ZnIHdpZHRoPVwiMTAwXCIgaGVpZ2h0PVwiMTAwXCI+JztcblxuICBmb3IgKHZhciBpID0gMDsgaSA8IDEwOyBpKyspIHtcbiAgICAgIHZhciByYWRpdXMgPSBnZXRSYW5kb21JbnQoNSwgNTApO1xuICAgICAgdmFyIGNvbG9yID0gZ2V0UmFuZG9tQ29sb3IoKTtcbiAgICAgIHN2ZyArPSAnPGNpcmNsZSBjeD1cIjUwXCIgY3k9XCI1MFwiIHI9XCInICsgcmFkaXVzICsgJ1wiIGZpbGw9XCInICsgY29sb3IgKyAnXCIgLz4nO1xuICB9XG5cbiAgc3ZnICs9ICc8L3N2Zz4nO1xuICByZXR1cm4gc3ZnO1xufVxubGV0IHJhbmRvbVNWRzsgLy8gRMOpY2xhcmF0aW9uIGRlIGxhIHZhcmlhYmxlIGF1IG5pdmVhdSBnbG9iYWxcblxuZnVuY3Rpb24gZ2VuZXJhdGVSYW5kb21TVkcoKSB7XG4gIHZhciBzdmcgPSAnPHN2ZyB4bWxucz1cImh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnXCIgd2lkdGg9XCIxMDBcIiBoZWlnaHQ9XCIxMDBcIj4nO1xuICBcbiAgZm9yICh2YXIgaSA9IDA7IGkgPCAxMDsgaSsrKSB7XG4gICAgdmFyIHJhZGl1cyA9IGdldFJhbmRvbUludCg1LCA1MCk7XG4gICAgdmFyIGNvbG9yID0gZ2V0UmFuZG9tQ29sb3IoKTtcbiAgICBzdmcgKz0gJzxjaXJjbGUgY3g9XCI1MFwiIGN5PVwiNTBcIiByPVwiJyArIHJhZGl1cyArICdcIiBmaWxsPVwiJyArIGNvbG9yICsgJ1wiIC8+JztcbiAgfVxuICBcbiAgc3ZnICs9ICc8L3N2Zz4nO1xuICByZXR1cm4gc3ZnO1xufVxuXG5cbi8vIFV0aWxpc2F0aW9uIGRlIGxhIHZhcmlhYmxlIMOgIGwnaW50w6lyaWV1ciBkJ3VuZSBmb25jdGlvblxuZnVuY3Rpb24gc2V0UHJvZmlsZUltYWdlKCkge1xuICByYW5kb21TVkcgPSBnZW5lcmF0ZVJhbmRvbVNWRygpO1xuICBjb25zb2xlLmxvZyhyYW5kb21TVkcpO1xuICBcbiAgXG4gIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdwaG90b0RlUHJvZmlsJykuc3JjID0gJ2RhdGE6aW1hZ2Uvc3ZnK3htbCwnICsgZW5jb2RlVVJJQ29tcG9uZW50KHJhbmRvbVNWRyk7XG59O1xuXG4vLyBBcHBlbCBkZSBsYSBmb25jdGlvbiBwb3VyIGTDqWZpbmlyIGwnaW1hZ2UgZGUgcHJvZmlsXG5zZXRQcm9maWxlSW1hZ2UoKTtcblxuLy8tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLy9cbi8vLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLSBDYXRlZ29yaWVzIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS8vXG4vLy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0vL1xuXG52YXIgY2F0ZWdvcnlJdGVtcyA9IGRvY3VtZW50LmdldEVsZW1lbnRzQnlDbGFzc05hbWUoJ2NhdGVnb3J5LWl0ZW0nKTtcbnZhciBmaXJzdENhdGVnb3J5SXRlbSA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdjYXRlZ29yeS1pdGVtLTEnKTtcblxuXG5kb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKFwiRE9NQ29udGVudExvYWRlZFwiLCBmdW5jdGlvbigpIHtcbiAgbGV0IGltYWdlcyA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoXCIuY2F0ZWdvcnktaW1hZ2VcIik7XG5cbiAgaW1hZ2VzLmZvckVhY2goaW1hZ2UgPT4ge1xuICAgICAgaW1hZ2UuYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBmdW5jdGlvbihlKSB7XG4gICAgICAgICAgLy8gVm90cmUgY29kZSBwb3VyIGwnZWZmZXQgaWNpLlxuICAgICAgICAgIC8vIFBhciBleGVtcGxlLCB2b3VzIHBvdXZleiBham91dGVyIHVuZSBjbGFzc2Ugw6AgbCdpbWFnZTpcbiAgICAgICAgICBlLnRhcmdldC5jbGFzc0xpc3QudG9nZ2xlKFwiYWN0aXZlXCIpO1xuICAgICAgfSk7XG4gIH0pO1xufSk7XG5cbiJdLCJuYW1lcyI6WyJ0ZXN0IiwiZ2V0SW1hZ2VQYXRoIiwiaW1hZ2VOYW1lIiwiZG9jdW1lbnQiLCJhZGRFdmVudExpc3RlbmVyIiwib25tb3VzZWVudGVyIiwibXlDYXJvdXNlbEVsZW1lbnQiLCJxdWVyeVNlbGVjdG9yIiwiY2Fyb3VzZWwiLCJib290c3RyYXAiLCJDYXJvdXNlbCIsImludGVydmFsIiwid3JhcCIsInBhbmllcnMiLCJKU09OIiwicGFyc2UiLCJsb2NhbFN0b3JhZ2UiLCJnZXRJdGVtIiwiYm91dG9uc0Fqb3V0ZXJQYW5pZXIiLCJxdWVyeVNlbGVjdG9yQWxsIiwiZm9yRWFjaCIsImJvdXRvbiIsInByb2R1Y3RJZCIsImlkIiwicmVwbGFjZSIsInBhbmllclZhbHVlRWxlbWVudCIsImdldEVsZW1lbnRCeUlkIiwiaW5uZXJUZXh0IiwiZmV0Y2giLCJtZXRob2QiLCJoZWFkZXJzIiwiYm9keSIsInN0cmluZ2lmeSIsInF1YW50aXR5IiwidGhlbiIsInJlc3BvbnNlIiwiY29uc29sZSIsImxvZyIsIm9rIiwiRXJyb3IiLCJzdGF0dXMiLCJqc29uIiwiZGF0YSIsImVycm9yIiwiYm91dG9uc1JldGlyZXJQYW5pZXIiLCJzdWNjZXNzIiwiYm91dG9uc0NvbmZpcm1lckNvbW1hbmRlIiwidXJsIiwid2luZG93IiwibG9jYXRpb24iLCJocmVmIiwiZ2V0UmFuZG9tSW50IiwibWluIiwibWF4IiwiTWF0aCIsImZsb29yIiwicmFuZG9tIiwiZ2V0UmFuZG9tQ29sb3IiLCJsZXR0ZXJzIiwiY29sb3IiLCJpIiwiZ2VuZXJhdGVSYW5kb21TVkciLCJzdmciLCJyYWRpdXMiLCJyYW5kb21TVkciLCJzZXRQcm9maWxlSW1hZ2UiLCJzcmMiLCJlbmNvZGVVUklDb21wb25lbnQiLCJjYXRlZ29yeUl0ZW1zIiwiZ2V0RWxlbWVudHNCeUNsYXNzTmFtZSIsImZpcnN0Q2F0ZWdvcnlJdGVtIiwiaW1hZ2VzIiwiaW1hZ2UiLCJlIiwidGFyZ2V0IiwiY2xhc3NMaXN0IiwidG9nZ2xlIl0sInNvdXJjZVJvb3QiOiIifQ==