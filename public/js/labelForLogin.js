/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***************************************!*\
  !*** ./resources/js/labelForLogin.js ***!
  \***************************************/
checkInputWithValidation();
function upLabel(labelName) {
  var label = document.getElementById(labelName);
  label.style.top = '-18px';
  label.style.fontSize = '12px';
}
function downLabel(labelName) {
  var label = document.getElementById(labelName);
  label.style.top = '0px';
  label.style.fontSize = '16px';
}
function showForm(cardName) {
  var card = document.getElementById(cardName);
  card.style.top = '-18px';
  card.style.fontSize = '12px';
}
function hideForm(cardName) {
  var card = document.getElementById(cardName);
  card.style.top = '0px';
  card.style.fontSize = '16px';
}
document.getElementById('input_email_log').addEventListener('focus', function () {
  upLabel('label_email_log');
});
document.getElementById('input_password_log').addEventListener('focus', function () {
  upLabel('label_password_log');
});
document.getElementById('input_email_log').addEventListener('blur', function () {
  downLabel('label_email_log');
  if (document.getElementById('input_email_log').value != '') {
    upLabel('label_email_log');
  } else {
    downLabel('label_email_log');
  }
});
document.getElementById('input_password_log').addEventListener('blur', function () {
  downLabel('label_password_log');
  if (document.getElementById('input_password_log').value != '') {
    upLabel('label_password_log');
  } else {
    downLabel('label_password_log');
  }
});
function checkInputWithValidation() {
  downLabel('label_email_log');
  if (document.getElementById('input_email_log').value != '') {
    upLabel('label_email_log');
  } else {
    downLabel('label_email_log');
  }
  if (document.getElementById('input_password_log').value != '') {
    upLabel('label_password_log');
  } else {
    downLabel('label_password_log');
  }
}
/******/ })()
;