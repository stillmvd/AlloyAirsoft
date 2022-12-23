/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/game.js ***!
  \******************************/
var _document$getElementB, _document$getElementB2, _document$getElementB3, _document$getElementB4, _document$getElementB5, _document$getElementB6, _document$getElementB7, _document$getElementB8, _document$getElementB9, _document$getElementB10, _document$getElementB11, _document$getElementB12;
var openRulesBlock = true;
var openInfoBlock = true;
var body = document.getElementById("body");
checkInputWithValidation();
function upLabel(labelName) {
  if (document.getElementById(labelName) !== null) {
    var label = document.getElementById(labelName);
    label.style.top = '-18px';
    label.style.fontSize = '12px';
  }
}
function downLabel(labelName) {
  if (document.getElementById(labelName) !== null) {
    var label = document.getElementById(labelName);
    label.style.top = '0px';
    label.style.fontSize = '16px';
  }
}
(_document$getElementB = document.getElementById('input_name')) === null || _document$getElementB === void 0 ? void 0 : _document$getElementB.addEventListener('focus', function () {
  upLabel('name_label');
});
(_document$getElementB2 = document.getElementById('input_surname')) === null || _document$getElementB2 === void 0 ? void 0 : _document$getElementB2.addEventListener('focus', function () {
  upLabel('surname_label');
});
(_document$getElementB3 = document.getElementById('input_callsign')) === null || _document$getElementB3 === void 0 ? void 0 : _document$getElementB3.addEventListener('focus', function () {
  upLabel('callsign_label');
});
(_document$getElementB4 = document.getElementById('input_email')) === null || _document$getElementB4 === void 0 ? void 0 : _document$getElementB4.addEventListener('focus', function () {
  upLabel('email_label');
});
(_document$getElementB5 = document.getElementById('input_phone')) === null || _document$getElementB5 === void 0 ? void 0 : _document$getElementB5.addEventListener('focus', function () {
  upLabel('phone_label');
});
(_document$getElementB6 = document.getElementById('input_team')) === null || _document$getElementB6 === void 0 ? void 0 : _document$getElementB6.addEventListener('focus', function () {
  upLabel('team_label');
});
(_document$getElementB7 = document.getElementById('input_name')) === null || _document$getElementB7 === void 0 ? void 0 : _document$getElementB7.addEventListener('blur', function () {
  downLabel('name_label');
  if (document.getElementById('input_name').value != '') {
    upLabel('name_label');
  } else {
    downLabel('name_label');
  }
});
(_document$getElementB8 = document.getElementById('input_surname')) === null || _document$getElementB8 === void 0 ? void 0 : _document$getElementB8.addEventListener('blur', function () {
  downLabel('surname_label');
  if (document.getElementById('input_surname').value != '') {
    upLabel('surname_label');
  } else {
    downLabel('surname_label');
  }
});
(_document$getElementB9 = document.getElementById('input_callsign')) === null || _document$getElementB9 === void 0 ? void 0 : _document$getElementB9.addEventListener('blur', function () {
  downLabel('callsign_label');
  if (document.getElementById('input_callsign').value != '') {
    upLabel('callsign_label');
  } else {
    downLabel('callsign_label');
  }
});
(_document$getElementB10 = document.getElementById('input_email')) === null || _document$getElementB10 === void 0 ? void 0 : _document$getElementB10.addEventListener('blur', function () {
  downLabel('email_label');
  if (document.getElementById('input_email').value != '') {
    upLabel('email_label');
  } else {
    downLabel('email_label');
  }
});
(_document$getElementB11 = document.getElementById('input_phone')) === null || _document$getElementB11 === void 0 ? void 0 : _document$getElementB11.addEventListener('blur', function () {
  downLabel('phone_label');
  if (document.getElementById('input_phone').value != '') {
    upLabel('phone_label');
  } else {
    downLabel('phone_label');
  }
});
(_document$getElementB12 = document.getElementById('input_team')) === null || _document$getElementB12 === void 0 ? void 0 : _document$getElementB12.addEventListener('blur', function () {
  downLabel('team_label');
  if (document.getElementById('input_team').value != '') {
    upLabel('team_label');
  } else {
    downLabel('team_label');
  }
});
function checkInputWithValidation() {
  var _document$getElementB13, _document$getElementB14, _document$getElementB15, _document$getElementB16, _document$getElementB17, _document$getElementB18;
  if (((_document$getElementB13 = document.getElementById('input_name')) === null || _document$getElementB13 === void 0 ? void 0 : _document$getElementB13.value) != '') {
    upLabel('name_label');
  } else {
    downLabel('name_label');
  }
  if (((_document$getElementB14 = document.getElementById('input_surname')) === null || _document$getElementB14 === void 0 ? void 0 : _document$getElementB14.value) != '') {
    upLabel('surname_label');
  } else {
    downLabel('surname_label');
  }
  if (((_document$getElementB15 = document.getElementById('input_callsign')) === null || _document$getElementB15 === void 0 ? void 0 : _document$getElementB15.value) != '') {
    upLabel('callsign_label');
  } else {
    downLabel('callsign_label');
  }
  downLabel('email_label');
  if (((_document$getElementB16 = document.getElementById('input_email')) === null || _document$getElementB16 === void 0 ? void 0 : _document$getElementB16.value) != '') {
    upLabel('email_label');
  } else {
    downLabel('email_label');
  }
  if (((_document$getElementB17 = document.getElementById('input_phone')) === null || _document$getElementB17 === void 0 ? void 0 : _document$getElementB17.value) != '') {
    upLabel('phone_label');
  } else {
    downLabel('phone_label');
  }
  downLabel('team_label');
  if (((_document$getElementB18 = document.getElementById('input_team')) === null || _document$getElementB18 === void 0 ? void 0 : _document$getElementB18.value) != '') {
    upLabel('team_label');
  } else {
    downLabel('team_label');
  }
}
if (document.getElementById('countdown') !== null) {
  var _document$getElementB19;
  var countDownDate = new Date((_document$getElementB19 = document.getElementById('countdown')) === null || _document$getElementB19 === void 0 ? void 0 : _document$getElementB19.textContent).getTime();
  var x = setInterval(function () {
    var _document$getElementB20, _document$getElementB21, _document$getElementB22, _document$getElementB23;
    var now = new Date().getTime();
    var distance = countDownDate - now;
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor(distance % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
    var minutes = Math.floor(distance % (1000 * 60 * 60) / (1000 * 60));
    var seconds = Math.floor(distance % (1000 * 60) / 1000);
    (_document$getElementB20 = document.getElementById('days')) === null || _document$getElementB20 === void 0 ? void 0 : _document$getElementB20.setAttribute('style', '--value:' + days);
    (_document$getElementB21 = document.getElementById('hours')) === null || _document$getElementB21 === void 0 ? void 0 : _document$getElementB21.setAttribute('style', '--value:' + hours);
    (_document$getElementB22 = document.getElementById('min')) === null || _document$getElementB22 === void 0 ? void 0 : _document$getElementB22.setAttribute('style', '--value:' + minutes);
    (_document$getElementB23 = document.getElementById('sec')) === null || _document$getElementB23 === void 0 ? void 0 : _document$getElementB23.setAttribute('style', '--value:' + seconds);
    if (distance < 0) {
      var _document$getElementB24, _document$getElementB25, _document$getElementB26, _document$getElementB27;
      clearInterval(x);
      (_document$getElementB24 = document.getElementById('days')) === null || _document$getElementB24 === void 0 ? void 0 : _document$getElementB24.setAttribute('style', '--value:' + 0);
      (_document$getElementB25 = document.getElementById('hours')) === null || _document$getElementB25 === void 0 ? void 0 : _document$getElementB25.setAttribute('style', '--value:' + 0);
      (_document$getElementB26 = document.getElementById('min')) === null || _document$getElementB26 === void 0 ? void 0 : _document$getElementB26.setAttribute('style', '--value:' + 0);
      (_document$getElementB27 = document.getElementById('sec')) === null || _document$getElementB27 === void 0 ? void 0 : _document$getElementB27.setAttribute('style', '--value:' + 0);
    }
  }, 1000);
}
function createInfoSquare() {
  setTimeout(function () {
    var infoSquare = document.getElementById('infoSquare');
    var infoBlockHeight = document.getElementById('infoBlock').clientHeight;
    var infoBlockWidth = document.getElementById('infoBlock').clientWidth;
    infoSquare.classList.add('duration-500');
    infoSquare.style.height = infoBlockHeight + 'px';
    infoSquare.style.width = infoBlockWidth + 'px';
    infoSquare.style.opacity = 70 + '%';
    infoSquare.style.right = -20 + 'px';
    infoSquare.style.bottom = -20 + 'px';
  }, 100);
}
function removeInfoSquare() {
  var infoSquare = document.getElementById('infoSquare');
  infoSquare.classList.remove('duration-500');
  infoSquare.style.height = 0 + 'px';
  infoSquare.style.width = 0 + 'px';
  infoSquare.style.opacity = 0 + '%';
  infoSquare.style.right = 0 + 'px';
  infoSquare.style.bottom = 0 + 'px';
}
function createRulesSquare() {
  setTimeout(function () {
    var rulesSquare = document.getElementById('rulesSquare');
    var rulesBlockHeight = document.getElementById('rulesBlock').clientHeight;
    var rulesBlockWidth = document.getElementById('rulesBlock').clientWidth;
    rulesSquare.classList.add('duration-500');
    rulesSquare.style.height = rulesBlockHeight + 'px';
    rulesSquare.style.width = rulesBlockWidth + 'px';
    rulesSquare.style.opacity = 70 + '%';
    rulesSquare.style.right = -20 + 'px';
    rulesSquare.style.bottom = -20 + 'px';
  }, 150);
}
function removeRulesSquare() {
  var rulesSquare = document.getElementById('rulesSquare');
  rulesSquare.classList.remove('duration-500');
  rulesSquare.style.height = 0 + 'px';
  rulesSquare.style.width = 0 + 'px';
  rulesSquare.style.opacity = 0 + '%';
  rulesSquare.style.right = 0 + 'px';
  rulesSquare.style.bottom = 0 + 'px';
}
/******/ })()
;