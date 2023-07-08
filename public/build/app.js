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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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O0FBRWpCO0FBQ0E7QUFDQTs7QUFFQSxJQUFJTSxhQUFhLEdBQUc5QixRQUFRLENBQUMrQixzQkFBc0IsQ0FBQyxlQUFlLENBQUM7QUFDcEUsSUFBSUMsaUJBQWlCLEdBQUdoQyxRQUFRLENBQUMyQixjQUFjLENBQUMsaUJBQWlCLENBQUM7QUFHbEUzQixRQUFRLENBQUNDLGdCQUFnQixDQUFDLGtCQUFrQixFQUFFLFlBQVc7RUFDdkQsSUFBSWdDLE1BQU0sR0FBR2pDLFFBQVEsQ0FBQ2tDLGdCQUFnQixDQUFDLGlCQUFpQixDQUFDO0VBRXpERCxNQUFNLENBQUNFLE9BQU8sQ0FBQyxVQUFBQyxLQUFLLEVBQUk7SUFDcEJBLEtBQUssQ0FBQ25DLGdCQUFnQixDQUFDLE9BQU8sRUFBRSxVQUFTb0MsQ0FBQyxFQUFFO01BQ3hDQSxDQUFDLENBQUNDLE1BQU0sQ0FBQ0MsU0FBUyxDQUFDQyxNQUFNLENBQUMsUUFBUSxDQUFDO0lBQ3ZDLENBQUMsQ0FBQztFQUNOLENBQUMsQ0FBQztBQUNKLENBQUMsQ0FBQyIsInNvdXJjZXMiOlsid2VicGFjazovL215X3Byb2plY3RfZGlyZWN0b3J5Ly4vcHVibGljL2Fzc2V0cy9qcy9tYWluLmpzIl0sInNvdXJjZXNDb250ZW50IjpbIlwidXNlIHN0cmljdFwiO1xubGV0IHRlc3QgPSB0cnVlIDtcblxuZnVuY3Rpb24gZ2V0SW1hZ2VQYXRoKGltYWdlTmFtZSkge1xuICByZXR1cm4gJ2Fzc2V0cy9pbWFnZXMvJyArIGltYWdlTmFtZTtcbn1cblxuXG4vLyBDYXJvdXNlbCBcblxuZG9jdW1lbnQuYWRkRXZlbnRMaXN0ZW5lcihcIkRPTUNvbnRlbnRMb2FkZWRcIiwgKG9ubW91c2VlbnRlcikgPT4ge1xuICBjb25zdCBteUNhcm91c2VsRWxlbWVudCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyNjYXJvdXNlbEV4YW1wbGVDYXB0aW9ucycpO1xuICBjb25zdCBjYXJvdXNlbCA9IG5ldyBib290c3RyYXAuQ2Fyb3VzZWwobXlDYXJvdXNlbEVsZW1lbnQsIHtcbiAgICBpbnRlcnZhbDogNDAwMCxcbiAgICB3cmFwOiB0cnVlXG4gIH0pO1xufSk7XG5cblxuXG4vLy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLy9cbi8vLS0tLS0tLS0tLS0tLS0tLS0tLS0tLSAgICAgICAgIFNWRyAgICAgICAgICAgICAgICAgICAgICAgICAgIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0vL1xuLy8tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS8vXG5cblxuZnVuY3Rpb24gZ2V0UmFuZG9tSW50KG1pbiwgbWF4KSB7XG4gIHJldHVybiBNYXRoLmZsb29yKE1hdGgucmFuZG9tKCkgKiAobWF4IC0gbWluICsgMSkpICsgbWluO1xufVxuXG5mdW5jdGlvbiBnZXRSYW5kb21Db2xvcigpIHtcbiAgdmFyIGxldHRlcnMgPSAnMDEyMzQ1Njc4OUFCQ0RFRic7XG4gIHZhciBjb2xvciA9ICcjJztcbiAgZm9yICh2YXIgaSA9IDA7IGkgPCA2OyBpKyspIHtcbiAgICAgIGNvbG9yICs9IGxldHRlcnNbTWF0aC5mbG9vcihNYXRoLnJhbmRvbSgpICogMTYpXTtcbiAgfVxuICByZXR1cm4gY29sb3I7XG59XG5cbmZ1bmN0aW9uIGdlbmVyYXRlUmFuZG9tU1ZHKCkge1xuICB2YXIgc3ZnID0gJzxzdmcgd2lkdGg9XCIxMDBcIiBoZWlnaHQ9XCIxMDBcIj4nO1xuXG4gIGZvciAodmFyIGkgPSAwOyBpIDwgMTA7IGkrKykge1xuICAgICAgdmFyIHJhZGl1cyA9IGdldFJhbmRvbUludCg1LCA1MCk7XG4gICAgICB2YXIgY29sb3IgPSBnZXRSYW5kb21Db2xvcigpO1xuICAgICAgc3ZnICs9ICc8Y2lyY2xlIGN4PVwiNTBcIiBjeT1cIjUwXCIgcj1cIicgKyByYWRpdXMgKyAnXCIgZmlsbD1cIicgKyBjb2xvciArICdcIiAvPic7XG4gIH1cblxuICBzdmcgKz0gJzwvc3ZnPic7XG4gIHJldHVybiBzdmc7XG59XG5sZXQgcmFuZG9tU1ZHOyAvLyBEw6ljbGFyYXRpb24gZGUgbGEgdmFyaWFibGUgYXUgbml2ZWF1IGdsb2JhbFxuXG5mdW5jdGlvbiBnZW5lcmF0ZVJhbmRvbVNWRygpIHtcbiAgdmFyIHN2ZyA9ICc8c3ZnIHhtbG5zPVwiaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmdcIiB3aWR0aD1cIjEwMFwiIGhlaWdodD1cIjEwMFwiPic7XG4gIFxuICBmb3IgKHZhciBpID0gMDsgaSA8IDEwOyBpKyspIHtcbiAgICB2YXIgcmFkaXVzID0gZ2V0UmFuZG9tSW50KDUsIDUwKTtcbiAgICB2YXIgY29sb3IgPSBnZXRSYW5kb21Db2xvcigpO1xuICAgIHN2ZyArPSAnPGNpcmNsZSBjeD1cIjUwXCIgY3k9XCI1MFwiIHI9XCInICsgcmFkaXVzICsgJ1wiIGZpbGw9XCInICsgY29sb3IgKyAnXCIgLz4nO1xuICB9XG4gIFxuICBzdmcgKz0gJzwvc3ZnPic7XG4gIHJldHVybiBzdmc7XG59XG5cblxuLy8gVXRpbGlzYXRpb24gZGUgbGEgdmFyaWFibGUgw6AgbCdpbnTDqXJpZXVyIGQndW5lIGZvbmN0aW9uXG5mdW5jdGlvbiBzZXRQcm9maWxlSW1hZ2UoKSB7XG4gIHJhbmRvbVNWRyA9IGdlbmVyYXRlUmFuZG9tU1ZHKCk7XG4gIGNvbnNvbGUubG9nKHJhbmRvbVNWRyk7XG4gIFxuICBcbiAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ3Bob3RvRGVQcm9maWwnKS5zcmMgPSAnZGF0YTppbWFnZS9zdmcreG1sLCcgKyBlbmNvZGVVUklDb21wb25lbnQocmFuZG9tU1ZHKTtcbn07XG5cbi8vIEFwcGVsIGRlIGxhIGZvbmN0aW9uIHBvdXIgZMOpZmluaXIgbCdpbWFnZSBkZSBwcm9maWxcbnNldFByb2ZpbGVJbWFnZSgpO1xuXG4vLy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0vL1xuLy8tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tIENhdGVnb3JpZXMgLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLy9cbi8vLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS8vXG5cbnZhciBjYXRlZ29yeUl0ZW1zID0gZG9jdW1lbnQuZ2V0RWxlbWVudHNCeUNsYXNzTmFtZSgnY2F0ZWdvcnktaXRlbScpO1xudmFyIGZpcnN0Q2F0ZWdvcnlJdGVtID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2NhdGVnb3J5LWl0ZW0tMScpO1xuXG5cbmRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoXCJET01Db250ZW50TG9hZGVkXCIsIGZ1bmN0aW9uKCkge1xuICBsZXQgaW1hZ2VzID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbChcIi5jYXRlZ29yeS1pbWFnZVwiKTtcblxuICBpbWFnZXMuZm9yRWFjaChpbWFnZSA9PiB7XG4gICAgICBpbWFnZS5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGZ1bmN0aW9uKGUpIHtcbiAgICAgICAgICBlLnRhcmdldC5jbGFzc0xpc3QudG9nZ2xlKFwiYWN0aXZlXCIpO1xuICAgICAgfSk7XG4gIH0pO1xufSk7XG5cbiJdLCJuYW1lcyI6WyJ0ZXN0IiwiZ2V0SW1hZ2VQYXRoIiwiaW1hZ2VOYW1lIiwiZG9jdW1lbnQiLCJhZGRFdmVudExpc3RlbmVyIiwib25tb3VzZWVudGVyIiwibXlDYXJvdXNlbEVsZW1lbnQiLCJxdWVyeVNlbGVjdG9yIiwiY2Fyb3VzZWwiLCJib290c3RyYXAiLCJDYXJvdXNlbCIsImludGVydmFsIiwid3JhcCIsImdldFJhbmRvbUludCIsIm1pbiIsIm1heCIsIk1hdGgiLCJmbG9vciIsInJhbmRvbSIsImdldFJhbmRvbUNvbG9yIiwibGV0dGVycyIsImNvbG9yIiwiaSIsImdlbmVyYXRlUmFuZG9tU1ZHIiwic3ZnIiwicmFkaXVzIiwicmFuZG9tU1ZHIiwic2V0UHJvZmlsZUltYWdlIiwiY29uc29sZSIsImxvZyIsImdldEVsZW1lbnRCeUlkIiwic3JjIiwiZW5jb2RlVVJJQ29tcG9uZW50IiwiY2F0ZWdvcnlJdGVtcyIsImdldEVsZW1lbnRzQnlDbGFzc05hbWUiLCJmaXJzdENhdGVnb3J5SXRlbSIsImltYWdlcyIsInF1ZXJ5U2VsZWN0b3JBbGwiLCJmb3JFYWNoIiwiaW1hZ2UiLCJlIiwidGFyZ2V0IiwiY2xhc3NMaXN0IiwidG9nZ2xlIl0sInNvdXJjZVJvb3QiOiIifQ==