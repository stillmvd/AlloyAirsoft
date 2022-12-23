/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*****************************************!*\
  !*** ./resources/js/getAchievements.js ***!
  \*****************************************/
var _loop = function _loop(i) {
  for (var y = 0; y < Number((_document$getElementB2 = document.getElementById('getCountAchievements')) === null || _document$getElementB2 === void 0 ? void 0 : _document$getElementB2.textContent); y++) {
    var _document$getElementB2;
    document.getElementById('change100' + i + y).onchange = function () {
      document.forms["getAchievements100" + i].submit();
    };
  }
};
for (var i = 1; i <= Number((_document$getElementB = document.getElementById('getCountPlayers')) === null || _document$getElementB === void 0 ? void 0 : _document$getElementB.textContent); i++) {
  var _document$getElementB;
  _loop(i);
}
/******/ })()
;