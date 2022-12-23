/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/header.js ***!
  \********************************/
function openMenu() {
  var links = document.getElementById('links');
  var menu = document.getElementById('menu');
  links.classList.remove('invisible');
  links.style.width = 20 + '%';
  menu.style.padding = '8px 40px 8px 40px';
  menu.style.borderRadius = '16px';
}
function closeMenu() {
  var links = document.getElementById('links');
  var menu = document.getElementById('menu');
  setTimeout(function () {
    links.classList.add('invisible');
    links.style.width = 10 + '%';
  }, 100);
  setTimeout(function () {
    menu.style.padding = '8px';
    menu.style.borderRadius = '9999px';
  }, 400);
}
/******/ })()
;