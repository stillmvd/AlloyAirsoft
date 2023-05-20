$(function() {
    var inputName = $('#input_name');
    var inputSurname = $('#input_surname');
    var inputCallsign = $('#input_callsign');
    var inputPhone = $('#input_phone');
    var inputTeamName = $('#input_teamName');
    var toggle = $('#toggle');
    var page = $('html');
    var moon = $('#moon');
    var sun = $('#sun');
    var count = 0;
  
    function upLabel(labelName) {
      $('#' + labelName).css({
        'top': '-18px',
        'font-size': '12px'
      });
    }
  
    function downLabel(labelName) {
      $('#' + labelName).css({
        'top': '0px',
        'font-size': '16px'
      });
    }
  
    function checkInputWithValidation() {
      downLabel('input_name');
      if (inputName.val() != '') {
        upLabel('label_name');
      } else {
        downLabel('label_name');
      }
  
      downLabel('input_surname');
      if (inputSurname.val() != '') {
        upLabel('label_surname');
      } else {
        downLabel('label_surname');
      }
  
      downLabel('input_callsign');
      if (inputCallsign.val() != '') {
        upLabel('label_callsign');
      } else {
        downLabel('label_callsign');
      }
  
      downLabel('input_phone');
      if (inputPhone.val() != '') {
        upLabel('label_phone');
      } else {
        downLabel('label_phone');
      }
  
      downLabel('input_teamName');
      if (inputTeamName.val() != '') {
        upLabel('label_teamName');
      } else {
        downLabel('label_teamName');
      }
    }
  
    inputName.on('focus blur', function() {
      upLabel('label_name');
      downLabel('label_name');
    });
  
    inputSurname.on('focus blur', function() {
      upLabel('label_surname');
      downLabel('label_surname');
    });
  
    inputCallsign.on('focus blur', function() {
      upLabel('label_callsign');
      downLabel('label_callsign');
    });
  
    inputPhone.on('focus blur', function() {
      upLabel('label_phone');
      downLabel('label_phone');
    });
  
    inputTeamName.on('focus blur', function() {
      upLabel('label_teamName');
      downLabel('label_teamName');
    });
  
    checkInputWithValidation();
  
    function findFile() {
      $('#hiddenFile').trigger('click');
    }
  
    var input = $('#hiddenFile');
  
    input.on('input', function() {
      $('#avatarForm').trigger('submit');
    });
  
    function deleteFile() {
      $('#deleteForm').trigger('submit');
    }
  
    function onResponse(d) {
      var obj = jQueryStatic.parseJSON(d);
      if (obj.success != 1) {
        alert('Ошибка!\nФайл ' + obj.filename + " не загружен - " + obj.myres);
      } else {
        alert('Файл загружен');
      }
    }

    function setTheme(theme) {
        localStorage.setItem('userTheme', theme);
        page.toggleClass('dark', theme === 'dark').toggleClass('light', theme === 'light');
        toggle.toggleClass('dark', theme === 'dark').toggleClass('light', theme === 'light');
        moon.toggleClass('swap-on', theme === 'light').toggleClass('swap-off', theme === 'dark');
        sun.toggleClass('swap-on', theme === 'dark').toggleClass('swap-off', theme === 'light');
    }
      
    function switchMode() {
      count++;
      if (count % 2 !== 0) {
        localStorage.setItem('switch', 'off');
        toggle.hasClass('dark') ? setLight() : setDark();
      }
    }
      
    let userTheme = localStorage.getItem('userTheme');
    let prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
      
    if (localStorage.getItem('switch') === 'on') {
      userTheme = prefersDark ? 'dark' : 'light';
    } else if (userTheme === null) {
      userTheme = prefersDark ? 'dark' : 'light';
    }
      
    setTheme(userTheme);
      
    $('#blockPhone').on('click', function() {
        var range = document.createRange();
        range.selectNode(document.getElementById('phone'));
        window.getSelection().removeAllRanges();
        window.getSelection().addRange(range);
        Document.execCommand('copy');
        window.getSelection().removeAllRanges();
    });
      
    $('#blockEmail').on('click', function() {
        var range = document.createRange();
        range.selectNode(document.getElementById('email'));
        window.getSelection().removeAllRanges();
        window.getSelection().addRange(range);
        Document.execCommand('copy');
        window.getSelection().removeAllRanges();
    });      
});
  